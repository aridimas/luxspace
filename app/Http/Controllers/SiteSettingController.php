<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\SiteSettingRequest;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SiteSetting $sitesetting)
    {
        if(request()->ajax()){
           
            $query = SiteSetting::orderBy('id', 'DESC')->get(); 
                 
            return DataTables::of($query)
            
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.sitesetting.edit', $item->id=1) .'" class="bg-yellow-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
           }
                
           $sitesetting1 = SiteSetting::get();
            return view('pages.dashboard.sitesetting.index', [
                'item' => $sitesetting
            ],compact('sitesetting1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.sitesetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteSettingRequest $request, SiteSetting $sitesetting)
    {
        $data = $request->all();
        $files = $request->file('logos','icons','thumbnails');

        $asd['site_name'] = $request->site_name;
        $asd['site_description'] = $request->site_description;
        $asd['facebook'] = $request->facebook;
        $asd['instagram'] = $request->instagram;
        $asd['twitter'] = $request->twitter;
        $asd['whatsapp'] = $request->whatsapp;
        $asd['email'] = $request->email;
        if($request->hasFile('logos','icons','thumbnails'))        
        {
            foreach ($files as $logo) {
                $path_logo = $logo->storeAs('public/logo', 'logo.jpg');
                $asd['logo_url'] =  str_replace('public/','storage/',$path_logo);
                // $asd = SiteSetting::insert([ 
                //     'logo_url'=>$path
                // ]);
                // dd($asd);
            }
            foreach ($files as $icon) {
                $path_icon = $icon->storeAs('public/icon', 'icon.jpg');
                $asd['icon_url'] =  str_replace('public/','storage/',$path_icon);
                // $cek = SiteSetting::insert([ 
                //     'icon_url'=>$path
                // ]);
                // dd($cek);
            }
            foreach ($files as $thumbnail) {
                $path_thumbnail = $thumbnail->storeAs('public/thumbnail', 'thumbnail.jpg');
                $asd['thumbnail_url'] = str_replace('public/','storage/',$path_thumbnail);
                // SiteSetting::insert([ 
                //     'thumbnail_url'=>$path
                // ]);
            }
            $update = SiteSetting::where('id', 1)->update($asd);
        }
        $update = SiteSetting::where('id', 1)->update($asd);
        
        return redirect()->route('dashboard.sitesetting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $sitesetting)
    {
        return view('pages.dashboard.sitesetting.edit', [
            'item' => $sitesetting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteSettingRequest $request, SiteSetting $sitesetting)
    {
        $data = $request->all();
        $files = $request->file('logos','icons','thumbnails');

        $asd['site_name'] = $request->site_name;
        $asd['site_description'] = $request->site_description;
        $asd['facebook'] = $request->facebook;
        $asd['instagram'] = $request->instagram;
        $asd['twitter'] = $request->twitter;
        $asd['whatsapp'] = $request->whatsapp;
        $asd['email'] = $request->email;
        if($request->hasFile('logos','icons','thumbnails'))        
        {
            foreach ($files as $logo) {
                $path_logo = $logo->storeAs('public/logo', 'logo.jpg');
                $asd['logo_url'] =  str_replace('public/','storage/',$path_logo);
                // $asd = SiteSetting::insert([ 
                //     'logo_url'=>$path
                // ]);
                // dd($asd);
            }
            foreach ($files as $icon) {
                $path_icon = $icon->storeAs('public/icon', 'icon.jpg');
                $asd['icon_url'] =  str_replace('public/','storage/',$path_icon);
                // $cek = SiteSetting::insert([ 
                //     'icon_url'=>$path
                // ]);
                // dd($cek);
            }
            foreach ($files as $thumbnail) {
                $path_thumbnail = $thumbnail->storeAs('public/thumbnail', 'thumbnail.jpg');
                $asd['thumbnail_url'] = str_replace('public/','storage/',$path_thumbnail);
                // SiteSetting::insert([ 
                //     'thumbnail_url'=>$path
                // ]);
            }
            $update = SiteSetting::where('id', 1)->update($asd);
        }
        $update = SiteSetting::where('id', 1)->update($asd);
        
        return redirect()->route('dashboard.sitesetting.index'); 
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
