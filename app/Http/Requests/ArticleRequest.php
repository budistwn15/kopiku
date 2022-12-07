<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','min:10','string'],
            'content' => ['required'],
            'categories' => ['required','array'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'title.min' => 'Minimal 10 karakter',
            'content.required' => 'Konten harus diisi',
            'categories.required' => 'Kategori harus diisi',
        ];
    }
}
