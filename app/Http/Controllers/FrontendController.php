<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $sitesetting = SiteSetting::get();
        $products = Product::with(['galleries'])->latest()->get();

        return view ('pages.frontend.index', compact('products','sitesetting'));
    }   

    public function about(Request $request)
    {
        return view ('pages.frontend.about');
    }

    public function catalog(Request $request)
    {
        $sitesetting = SiteSetting::get();
        $products = Product::with(['galleries'])->where('categories_id',2)->inRandomOrder()->limit(4)->get();
        $products2 = Product::with(['galleries'])->where('categories_id',1)->inRandomOrder()->limit(4)->get();
        $products3 = Product::with(['galleries'])->inRandomOrder()->paginate(9);
        $category = Category::get();
       
        return view ('pages.frontend.catalog', compact('products','products2','products3','sitesetting','category'));
    }


    public function details(Request $request, $slug)
    {
        $sitesetting = SiteSetting::get();
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recommendations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();
        return view ('pages.frontend.details', compact('product','recommendations','sitesetting'));
    }
    public function category(Request $request, $slug)
    {
        $sitesetting = SiteSetting::get();
        $category = Category::with(['products'])->where('slug', $slug)->first();
        $product = $category->products()->orderBy('created_at')->paginate(9);
        $products = Product::with(['galleries'])->inRandomOrder()->paginate(9);
        return view ('pages.frontend.category', compact('products','category','sitesetting','product'));
    }
    
    public function cartAdd(Request $request, $id)
    {
        Cart::create([
            'users_id' => Auth::user()->id,
            'products_id' => $id
        ]);
        return redirect ('cart');
    }

    public function cartDelete(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        return redirect ('cart');
    }

    public function cart(Request $request)
    {
        $carts = Cart::with(['product.galleries'])->where('users_id', Auth::user()->id)->get();
        return view ('pages.frontend.cart', compact('carts'));
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->all();

        //get carts data
        $carts=Cart::with(['product'])->where('users_id', Auth::user()->id)->get();

        //add to Transaction data
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('product.price');
        

        //create transaction
        $transaction = Transaction::create($data);

        //create transaction item
        foreach ($carts as $cart) {
            $items[] = TransactionItem::create([
                'transactions_id' => $transaction->id,
                'users_id' => $cart->users_id,
                'products_id' => $cart->products_id
            ]);
        }

        //delete cart after transaction
        Cart::where('users_id', Auth::user()->id)->delete();
       
        //konfigurasi midtrans
        Config::$serverKey      = config('services.midtrans.serverKey');
        Config::$isProduction   = config('services.midtrans.isProduction');
        Config::$isSanitized    = config('services.midtrans.isSanitized');
        Config::$is3ds          = config('services.midtrans.is3ds');

        //Setup Variable Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total_price
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email               
            ],
            'enabled_payments' => ['gopay','bank_transfer'],
            'vtweb' => []
        ];

        //payment process
        try {

          // Get Snap Payment Page URL
          $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
          $transaction->payment_url = $paymentUrl;
          $transaction->save();
            // Redirect to Snap Payment Page
          return redirect($paymentUrl);

        }
        catch (Exception $e) {
          echo $e->getMessage();
        }
    }
    public function  success(Request $request)
    {
        return view ('pages.frontend.success');
    }
    public function callback(Request $request, Transaction $transaction){
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'settlement'){
                $transaction = Transaction::find($request->order_id);
                $transaction->update(['payment_status' => 'Paid']);
            }
        }

    }
    
}
