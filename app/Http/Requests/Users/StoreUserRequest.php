<?php
declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'login' => '',
            'email' => ['string', 'required', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
            'roles' => 'array'
        ];
    }
}
