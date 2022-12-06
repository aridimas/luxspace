<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            Product &raquo; {{$product->name}} &raquo; Gallery
        </h2>
    </x-slot>

    <x-slot name="script">
        @csrf
        <script>
            function submit_form(is_featured,id){
                var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{asset("dashboard/product/gallery")}}', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText)
                            if (this.responseText == 1) {
                                alert("Update Success!");
                                location.reload();
                            } else {
                                alert("Update Failed!");
                                location.reload();
                            }
                        }
                    };
                    xhr.send('value='+is_featured+'&id='+id);
                }
        </script>
        <script>
            // AJAX Datatable
            $(document).ready(function () {
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: 
                [
                    { data:'id', name:'id', width :'5%'},
                    { data:'url', name:'url'},
                    { data:'is_featured', name:'is_featured'},
                    { 
                        data:'action',
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'25%'
                    }
                    
                ],
                order:[[1,'asc']],
                    
            });
            datatable.on('order.dt search.dt', function () {
                let i = 1;
        
                datatable.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
        }).draw();
    });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href=" {{route('dashboard.product.gallery.create', $product->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Upload Photos
                </a>
            </div>
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Featured</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
    
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
