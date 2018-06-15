<?php

namespace App\Http\Requests;

use App\User;
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
        return true;
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
        $rules['uri'] = $this->validarUrl();
        $rules['descripcion'] = $this->validarDescripcion();
        $rules['tipo'] = $this->validarTipo();
        $rules['privacidad'] = $this->validarPrivacidad();
        $rules['tags'] = $this->validarTags();

        return $rules;
    }

    public function messages()
    {
        $mensajeTitulo = $this->mensajesTitulo();
        $mensajeDescripcion = $this->mensajesDescripcion();
        $mensajeTipo = $this->mensajesTipo();
        $mensajeUrl = $this->mensajesUrl();
        $mensajePrivacidad = $this->mensajesPrivacidad();
        $mensajeTags = $this->mensajesTags();

        $mensajes = array_merge(
            $mensajeTitulo,
            $mensajeDescripcion,
            $mensajeTipo,
            $mensajeUrl,
            $mensajePrivacidad,
            $mensajeTags
        );

        return $mensajes;

    }

    protected function validarTitulo(){
        return 'required|string|max:50|min:1';
    }

    protected function validarDescripcion(){
        return 'required|string|max:50|min:1';
    }

    protected function validarTipo(){
        return 'required|string|max:50|min:1';
    }

    protected function validarUrl(){
        return 'required|string|max:50|min:1';
    }

    protected function validarPrivacidad(){
        return 'required|string|max:50|min:1';
    }

    protected function validarTags(){
        return 'required|string|max:50|min:1';
    }

    protected function mensajesTitulo(){
        $mensajes = array();
        $mensajes["titulo.required"] = 'Introduzca el titulo';
        $mensajes["titulo.string"] = 'Introduzca el titulo';
        $mensajes["titulo.max"] = 'Supera el máximo';
        $mensajes["titulo.min"] = 'Tiene que tener un cararcter minimo';
        return $mensajes;
    }

    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes["descripcion.required"] = 'Introduzca la descripcion';
        $mensajes["descripcion.string"] = 'Introduzca la descripcion';
        $mensajes["descripcion.max"] = 'Supera el máximo';
        $mensajes["descripcion.min"] = 'Tiene que tener un caracter minimo';
        return $mensajes;
    }

    protected function mensajesTipo(){
        $mensajes = array();
        $mensajes["tipo.required"] = 'Introduzca un tipo';
        $mensajes["tipo.string"] = 'Introduzca un tipo';
        $mensajes["tipo.max"] = 'Supera el máximo';
        $mensajes["tipo.min"] = 'Tiene que tener un caracter minimo';
        return $mensajes;
    }

    protected function mensajesUrl(){
        $mensajes = array();
        $mensajes["uri.required"] = 'Introduzca la uri';
        $mensajes["uri.string"] = 'Introduzca la uri';
        $mensajes["uri.max"] = 'Supera el máximo';
        $mensajes["uri.min"] = 'Tiene que tener un caracter minimo';
        return $mensajes;
    }

    protected function mensajesPrivacidad(){
        $mensajes = array();
        $mensajes["privacidad.required"] = 'Introduzca la privacidad';
        $mensajes["privacidad.string"] = 'Introduzca la privacidad';
        $mensajes["privacidad.max"] = 'Supera el máximo';
        $mensajes["privacidad.min"] = 'Tiene que tener un caracter minimo';
        return $mensajes;
    }

    protected function mensajesTags(){
        $mensajes = array();
        $mensajes["tags.required"] = 'Introduzca la tags';
        $mensajes["tags.string"] = 'Introduzca la tags';
        $mensajes["tags.max"] = 'Supera el máximo';
        $mensajes["tags.min"] = 'Tiene que tener un caracter minimo';
        return $mensajes;
    }

}
