<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', Rule::unique('users')->ignore($this->user)],
            'email' =>  ['required', 'email', Rule::unique('users')->ignore($this->user)],
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
