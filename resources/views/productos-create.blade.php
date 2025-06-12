<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulario de producto') }}
        </h2>
    </x-slot>
    
    <div class="container-fluid">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-12 col-md-6 mt-3">
                <form id="formulario" action="{{ isset($producto) ? route('productos.update', $producto) : route('productos.store') }}" method="POST">
                    @csrf

                    @if(isset($producto))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="sku" class="form-label">Sku</label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku"
                            name="sku" value="{{ old('sku', $producto->sku ?? '') }}" autocomplete="off"
                            onkeypress="return /[0-9]/i.test(event.key)">
                        @error('sku')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" autocomplete="off">
                        @error('nombre')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="text" class="form-control @error('cantidad') is-invalid @enderror"
                            id="cantidad" name="cantidad" value="{{ old('cantidad', $producto->cantidad ?? '') }}" autocomplete="off"
                            onkeypress="return /[0-9]/i.test(event.key)">
                        @error('cantidad')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio"
                            name="precio" value="{{ old('precio', $producto->precio ?? '') }}" autocomplete="off"
                            onkeypress="return /[0-9]/i.test(event.key)">
                        @error('precio')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
                            rows="2" autocomplete="off">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
