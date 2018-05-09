<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = array();

        $rules['titulo'] = $this->validarTitulo();
        $rules['descripcion'] = $this->validarDescripcion();
        $rules['tipo'] = $this->validarTipo();

        return $rules;
    }

    public function messages()
    {
        $mensajeTitulo = $this->mensajesTitulo();
        $mensajeDescripcion = $this->mensajesDescripcion();
        $mensajeTipo = $this->mensajesTipo();

        $mensajes = array_merge(
            $mensajeTitulo,
            $mensajeDescripcion,
            $mensajeTipo
        );

        return $mensajes;

    }

    protected function validarTitulo(){
        return 'required|string|max:10';
    }

    protected function validarDescripcion(){
        return 'required|string|max:10';
    }

    protected function validarTipo(){
        return 'required|string|max:10';
    }

    protected function mensajesTitulo(){
        $mensajes = array();
        $mensajes["titulo.required"] = 'Introduzca el titulo';
        $mensajes["titulo.string"] = 'Introduzca el titulo';
        $mensajes["titulo.max"] = 'Supera el máximo';
        return $mensajes;
    }

    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes["descripcion.required"] = 'Introduzca la descripcion';
        $mensajes["descripcion.string"] = 'Introduzca la descripcion';
        $mensajes["descripcion.max"] = 'Supera el máximo';
        return $mensajes;
    }

}
