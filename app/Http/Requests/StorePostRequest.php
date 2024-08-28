<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostLimit;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust this if you have authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', new PostLimit],
            'description' => ['required', 'min:10'],
            'image' => ['nullable', 'max:2048'],
        ];
    }
    
    // function passedValidation(){

    // }
    // function prepareForValidation(){

    // }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required.',
            'description.required' => 'A description is required.',
            'image.max' => 'The image size should not be more than 2MB.',
        ];
    }
}
