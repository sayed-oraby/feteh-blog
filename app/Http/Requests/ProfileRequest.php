<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:users,name,'. Auth::id(),
            'email' => 'required|email|unique:users,email,'. Auth::id(),
            'phone' => 'nullable|numeric|max:11',
            'image' => 'nullable|image',
            'description' => 'nullable|string|max:200',
            'gender' => 'nullable|in:male,female',
        ];
    }
}
