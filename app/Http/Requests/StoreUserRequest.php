<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'name_eng' => 'required',
            'user_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'یوزر کا نام ضروری ہے',
            'name_eng.required' => 'انگریزی میں نام ضروری ہے',
            'user_name.required' => 'لاگ ان نیم ضروری ہے',
            'email.required' => 'ایمیل ضروری ہے',
            'email.email' => 'ایمیل کا فارمیٹ درست نہیں',
            'password.required' => 'خفیہ کوڈ ضروری ہے',
            'role.required' => 'رول ضروری ہے',
        ];
    }
}
