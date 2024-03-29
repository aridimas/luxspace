<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Transaction::orderBy('id', 'DESC')->get(); 
                 
            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.transaction.show', $item->id) .'" class="bg-blue-500 text-white rounded-md px-2 py-1 mr-2">
                            Show
                        </a>
                        <a href="'. route('dashboard.transaction.edit', $item->id) .'" class="bg-yellow-500 text-white rounded-md px-2 py-1 mr-2">
                            Edit
                        </a>
                        
                    ';
                })
                ->editColumn('total_price', function($item)
                {
                    return number_format($item->total_price);
                })
                ->editColumn('payment_status', function($item){
                    return ($item->payment_status == "paid") ? "<strong class='text-green-500'>PAID</strong>" : "<strong class='text-red-500 '>UNPAID</strong>" ;
                })
                ->escapeColumns([])
                ->rawColumns(['action'])
                ->make();
           }
                
           
            return view('pages.dashboard.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        if(request()->ajax()){
            $query = TransactionItem::with(['product'])->where('transactions_id',$transaction->id);  
                 
            return DataTables::of($query)
                ->editColumn('product.price', function($item)
                {
                    return number_format($item->product->price);
                })
                ->rawColumns(['action'])
                ->make();
           }
                
           
            return view('pages.dashboard.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit',[
            'item'=>$transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all(); 

        $transaction->update($data);
        
        return redirect()->route('dashboard.transaction.index'); 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
