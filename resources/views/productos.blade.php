

<x-app-layout>
    @push('styles')
        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/r-3.0.4/datatables.min.css" rel="stylesheet" integrity="sha384-f4eoZJJq8gNOK1OSV5LSHZGgb5BmuPcYDXOGzV565hdJoa6L2u9NQgO0Dxr1f2GU" crossorigin="anonymous">
        <style>
            .dt-search {
                display: none !important;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12 col-md-11">
                <div class="row mt-1">
                    <div class="col-md-12 text-end">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary">
                            Crear Producto
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center mt-2">
                    <div class="col-md-12">
                        <h5>Filtros</h5>
                    </div>
                </div>
                
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4">
                        <input type="text" id="buscador" class="form-control" placeholder="Buscar">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="min_precio" class="form-control" placeholder="Precio mínimo" onkeypress="return /[0-9]/i.test(event.key)">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="max_precio" class="form-control" placeholder="Precio máximo" onkeypress="return /[0-9]/i.test(event.key)">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="min_total" class="form-control" placeholder="Total mínimo" onkeypress="return /[0-9]/i.test(event.key)">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="max_total" class="form-control" placeholder="Total máximo" onkeypress="return /[0-9]/i.test(event.key)">
                    </div>
                </div>

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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal1">¿Esta seguro de querer eliminar el producto seleccionado?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="modal-btn-eliminar" class="btn btn-danger" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/r-3.0.4/datatables.min.js" integrity="sha384-hw3H608pBQC0bs/NkFNMmggoElJm4Vk7hTXlmsQPkBSxT8Nqu8Db40A+OIJAlLu7" crossorigin="anonymous"></script>

        <script>
            let tabla;

            $(function() {
                tabla = $('#productos-table').DataTable({
                    processing: true,
                    serverSide: true,
                    // searching: false,
                    // dom: 'lrtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 10,
                    order: [[0, 'desc']],  
                    ajax: {
                        url: '{{ route("productos.data") }}',
                        data: function (d) {
                            d.min_precio = $('#min_precio').val();
                            d.max_precio = $('#max_precio').val();
                            d.min_total = $('#min_total').val();
                            d.max_total = $('#max_total').val();
                        }
                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'sku', name: 'sku' },
                        { data: 'nombre', name: 'nombre' },
                        { data: 'descripcion', name: 'descripcion' },
                        { data: 'cantidad', name: 'cantidad' },
                        { data: 'precio', name: 'nombre' },
                        { data: 'total', name: 'nombre' },
                        { data: 'fecha_creacion', name: 'fecha_creacion' },
                        {
                            orderable: false,
                            data: null,
                            render: function(data, type, row) {
                                return `
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/productos/${row.id}/edit" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${row.id}">
                                            Eliminar
                                        </button>
                                    </div>
                                `;
                            }
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-CO.json'
                    }
                });

                $('#buscador').on('keyup', function() {
                    tabla.search(this.value).draw();
                });

                $('#min_precio, #max_precio, #min_total, #max_total').on('keyup change', function () {
                    tabla.draw();
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let idSeleccionado;

                function showModal(modalId) {
                    const myModal = new bootstrap.Modal(document.getElementById(modalId), {
                        keyboard: false
                    })
                    myModal.show();
                }

                document.addEventListener('click', async function (e) {
                    const button = e.target.closest('.btn-eliminar');
                    if (!button) return;

                    idSeleccionado = button.dataset.id;
                    showModal('modalEliminar');
                });

                // Evento cuando el usuario confirma la eliminación en el modal
                document.getElementById('modal-btn-eliminar').addEventListener('click', async function () {
                    if (!idSeleccionado) return;

                    try {
                        const response = await fetch(`/productos/${idSeleccionado}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                // 'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        const data = await response.json();
                        if (data.success) tabla.draw();

                    } catch (error) {
                        console.error(error);
                    } finally {
                        idSeleccionado = null;
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
