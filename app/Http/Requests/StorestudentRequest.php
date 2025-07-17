<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorestudentRequest extends FormRequest
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
            'student_name' => 'required|string|max:100',
            'IC' => 'required|numeric',
            'password' => 'required|string|min:6',
            're-password' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'student_name.required' => 'Student name is required.',
            'IC.required' => 'IC number is required.',
            'IC.numeric' => 'IC must be a number.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            're-password.required' => 'Please confirm your password.',
            're-password.same' => 'Passwords do not match.',
        ];
    }
}
