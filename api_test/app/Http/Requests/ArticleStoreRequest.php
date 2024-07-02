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
            'title'=>'required|string|max:255',
            'author'=>'required|string',
            'content'=>'required|string',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Le titre est obligatoire',
            'title.string'=>'Le titre doit etre en lettre',
            'title.max'=>'Le titre ne doit pas depasser 225 caracteres',
            'author.required'=>"L'auteur est obligatoire",
            'author.string'=>"L'auteur doit etre en lettre",
            'content.required'=>'Le ocntentu est obligatoire',
            'content.string'=>'Le contenu doit etre en lettre',
        ];
    }
}
