<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'type' => 'required|in:admin,blogger,user',
            'roles' => ['nullable', function($attribute, $value, $fail) {
                if (is_array($value)) {
                    foreach ($value as $key => $value) {
                        if (! Role::find($value)) {
                            return $fail('you insert invalid roles');
                        }
                    }
                }
            }]
        ];
    }
}
