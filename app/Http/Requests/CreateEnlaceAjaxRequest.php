<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateEnlaceAjaxRequest extends CreateEnlaceRequest
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

        if ($this->exists('titulo')) {
            $rules['titulo'] = $this->validarTitulo();
        }

        if ($this->exists('uri')) {
            $rules['uri'] = $this->validarUrl();
        }

        if ($this->exists('tipo')) {
            $rules['tipo'] = $this->validarTipo();
        }

        if ($this->exists('descripcion')) {
            $rules['descripcion'] = $this->validarDescripcion();
        }

        if ($this->exists('privacidad')) {
            $rules['privacidad'] = $this->validarPrivacidad();
        }

        if ($this->exists('tags')) {
            $rules['tags'] = $this->validarTags();
        }

        return $rules;
    }

    protected function failedValidation($validator)

    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'titulo' => $errors->get('titulo'),
            'uri' => $errors->get('uri'),
            'tipo' => $errors->get('tipo'),
            'descripcion' => $errors->get('descripcion'),
            'privacidad' => $errors->get('privacidad'),
            'tags' => $errors->get('tags')
        ]);

        throw new ValidationException($validator, $response);
    }
}
