<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAddRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:5|max:120',
            'user_id' => 'required|integer|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload with validation
        ];
    }

    public function messages(): array
    {
        return [
            'age.min' => 'The student must be at least :min years old.',
            'email.unique' => 'The email address is already in use by another student.',
            'date_of_birth.before' => 'The date of birth must be a date before today.',
        ];
    }
}
