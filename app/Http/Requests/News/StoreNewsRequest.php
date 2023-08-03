<?php
declare(strict_types=1);

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:200'],
            'description' => ['nullable'],
            'image' => ['sometimes', 'image', 'mimes:jpg,png,bmp'],
            'source_id' => ['nullable'],
            'categories' => 'nullable|array',
            'categories.*' => 'nullable'
        ];
    }

    public function getCategories(): array|null
    {
        return $this->validated('categories');
    }

    public function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'author' => 'автор'
        ];
    }
}
