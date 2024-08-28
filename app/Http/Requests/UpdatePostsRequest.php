<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;
       return $this->user()->can('update', $this->post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required ', 'min:3'],
            'description' => ['required', 'min:10'],
            'image' => ["nullable", 'max:2048'],

        ];
    }
    function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'description.required' => 'A description is required',
            'image.max' => 'The image size should not be more than 2MB',

        ];
    }
}
