<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:2048'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'description.required' => 'A description is required',
            'image.max' => 'The image size should not be more than 2MB',
            'user_id.exists' => 'The user does not exist'
        ];
    }
}
