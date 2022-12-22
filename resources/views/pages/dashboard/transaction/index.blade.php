<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX Datatable
            $(document).ready(function () {
            var datatable = $('#crudTable').DataTable({
                
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: 
                [
                    { data:'id', name:'id', width :'5%', "className": "dt-center"},
                    { data:'name', name:'name'},
                    { data:'phone', name:'phone', "className": "dt-center"},
                    { data:'total_price', name:'total_price', "className": "dt-center"},
                    { data:'status', name:'status', "className": "dt-center", render: function(data,type,row){return data.toUpperCase()}},
                    { data:'payment_status', name:'payment_status', "className": "dt-center"},
                    { data:'created_at', name:'created_at', "className": "dt-center", render: function(data, type, row){
                        if(type === "sort" || type === "type"){
                            return data;
                        }
                        return "<strong>Create</strong>: " + moment(data.created_at).format("YYYY/MM/DD HH:mm") + "<br/><strong>Update</strong>: " + moment(data.updated_at).format("YYYY/MM/DD HH:mm")
                        }},
                    {   
                        data:'action', "className": "dt-center",
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'25%',
                    }
                ],
                order:[[7,'desc']],
                    
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
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Harga</th>
                                <th>Pengiriman</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
