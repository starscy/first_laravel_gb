<?php
declare(strict_types=1);

namespace App\Http\Requests\API;

use App\Models\Source;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'author' => 'nullable',
            'description' => ['nullable', 'string', 'min:2'],
            'image' => ['sometimes'],
            'source_id' => ['nullable'],
            'categories' => '',
        ];
    }

    public function getCategories(): array|null
    {
        return $this->validated('categories');
    }
}
