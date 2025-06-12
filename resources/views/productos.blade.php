

<x-app-layout>
    @push('styles')
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/r-3.0.4/datatables.min.js" integrity="sha384-hw3H608pBQC0bs/NkFNMmggoElJm4Vk7hTXlmsQPkBSxT8Nqu8Db40A+OIJAlLu7" crossorigin="anonymous"></script>
    @endpush

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-12 col-md-11 mt-3">
                <table id="productos-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/r-3.0.4/datatables.min.css" rel="stylesheet" integrity="sha384-f4eoZJJq8gNOK1OSV5LSHZGgb5BmuPcYDXOGzV565hdJoa6L2u9NQgO0Dxr1f2GU" crossorigin="anonymous">

        <script>
            $(function() {
                $('#productos-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: true,
                    pageLength: 10,
                    ajax: '{{ route('productos.data') }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'sku', name: 'sku' },
                        { data: 'nombre', name: 'nombre' },
                        { data: 'descripcion', name: 'descripcion' },
                        { data: 'cantidad', name: 'cantidad' },
                        { data: 'precio', name: 'nombre' },
                        { data: 'total', name: 'nombre' },
                        { data: 'fecha_creacion', name: 'fecha_creacion' },
                    ],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/2.3.2/i18n/es-CO.json',
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
