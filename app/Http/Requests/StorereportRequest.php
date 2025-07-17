<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorereportRequest extends FormRequest
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
            'student_ic' => 'required|numeric',
            'report' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'student_ic.required' => 'Student IC is required.',
            'student_ic.numeric' => 'Student IC must be a number.',
            'report.required' => 'Report content is required.',
            'report.max' => 'Report cannot exceed 1000 characters.',
        ];
    }
}
