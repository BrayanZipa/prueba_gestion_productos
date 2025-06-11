<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productoId = $this->route('producto')?->id ?? $this->route('producto');

        return [
            'sku' => 'required|integer|unique:productos,sku,' . $productoId,
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|numeric|min:1',
            'precio' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'sku.required' => 'El código SKU es requerido',
            'sku.integer' => 'El código SKU debe ser un número entero',
            'sku.unique' => 'Ya existe un producto con el código SKU ingresado',
            'nombre.required' => 'El nombre del producto es requerido',
            'nombre.string' => 'El nombre del producto debe ser una cadena de texto',
            'descripcion.string' => 'La descripción debe ser una cadena de texto',
            'cantidad.required' => 'La cantidad es requerida',
            'cantidad.numeric' => 'La cantidad debe ser un valor numérico',
            'cantidad.min' => 'La cantidad no puede ser menor a 1',
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe ser un valor numérico',
            'precio.min' => 'El precio no puede ser menor a 1',
        ];
    }
}
