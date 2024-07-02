<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
        return [
            'title'=>'required|string|max:258',
            'auteur'=>'required|string',
            'content'=>'required|string',
        ];
    }
    public function messages(){
        return[
            'title.required'=>'Le titre est requis',
            'title.string'=>'Le titre doit etre en lettre',
            'title.max'=>'Le titre  e doit pas depasser 258 caracteres ',

            'auteur.required'=>"L'auteur est obligatoire",
            'auteur.string'=>" L'auteur doit en tre en lettre",

            'content.required'=> "Le contenu est obligatoire",
            'content.string'=>"Le dooit etre en caracteres "

        ];
    }
}
