<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:200'] ,
            'description' => ['nullable', 'string', 'min:2'],
            'image'=> ['sometimes'],
            'source_id' =>'',
            'categories' => ''
        ];
    }

    public function getCategories():array | null
    {
        return $this->validated('categories');
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'author' => 'автор'
        ];
    }
}
