<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'qualification' => 'required|string|max:255',
            'guardianname' => 'required|string|max:255',
            'relationshiptoguardian' => 'required|string|max:255',
            'guardiantelephone' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'departments' => 'required|array',
            'courses' => 'required|array',
            'referenced_person' => 'required|array',
            'relationship' => 'required|array',
            'referencecontact' => 'required|array',
        ];
    }
}
