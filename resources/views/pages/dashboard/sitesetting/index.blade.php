<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Site &raquo; @foreach ($sitesetting1 as $name)
            {{ $name->site_name }}
            @endforeach &raquo; Settings
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{$error}} </li>                                        
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <form action=" {{route('dashboard.sitesetting.store')}}  " class="w-full" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Website</label>
                            <input type="text" value="@foreach ($sitesetting1 as $name){{$name->site_name}}"
                            @endforeach name="site_name" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Deskripsi Website</label>
                            <input type="text" value="@foreach ($sitesetting1 as $desc){{$desc->site_description}}"
                            @endforeach name="site_description" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Logo Website</label>
                            <input type="file" multiple="multiple" name="logos[]"  accept="image/*" placeholder="logo" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    @if ((!is_null($sitesetting1[0]['logo_url'])) && (!empty($sitesetting1[0]['logo_url'])))
                        <div class="w-full px-3">
                            <img src="{{ route('index') }}/{{ $sitesetting1[0]['logo_url'] }}" class="img img-responsive mt-3">
                        </div>
                    @endif

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Icon Website </label>
                            <input type="file" multiple="multiple" name="icons[]"  accept="image/*" placeholder="icon" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    @if ((!is_null($sitesetting1[0]['icon_url'])) && (!empty($sitesetting1[0]['icon_url'])))
                        <div class="w-full px-3">
                            <img src="{{ route('index') }}/{{ $sitesetting1[0]['icon_url'] }}" class="img img-responsive mt-3">
                        </div>
                    @endif
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tumbnail</label>
                            <input type="file" multiple="multiple" name="thumbnails[]" accept="image/*" placeholder="thumbnail" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    @if ((!is_null($sitesetting1[0]['thumbnail_url'])) && (!empty($sitesetting1[0]['thumbnail_url'])))
                        <div class="w-full px-3">
                            <img src="{{ route('index') }}/{{ $sitesetting1[0]['thumbnail_url'] }}" class="img img-responsive mt-3">
                        </div>
                        
                    @endif
                    
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Link Facebook Page</label>
                            <input type="link" value="{{ $sitesetting1[0]['facebook'] }}" name="facebook" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Link instagram profile</label>
                            <input type="link" value="{{ $sitesetting1[0]['instagram'] }}" name="instagram" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Link Twitter</label>
                            <input type="link" value="{{ $sitesetting1[0]['twitter'] }}"name="twitter" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Link Whatsapp</label>
                            <input type="link" value="@foreach ($sitesetting1 as $whatsapp){{$whatsapp->whatsapp}}"
                            @endforeach" name="whatsapp"  class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email Address</label>
                            <input type="email" value="@foreach ($sitesetting1 as $email){{$email->email}}"
                            @endforeach name="email"  class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                       
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- //multiple untuk menambahkan lebih dari satu files    type=files untuk type uploadnya hanya boleh file, // name=files[] file yg diupload akan dimasukkan ke array       accept untuk validasi     --}}
   
    
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
