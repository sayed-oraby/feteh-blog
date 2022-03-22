<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', Rule::unique('roles')],
            'permissions' => ['required', 'array', function($attribute, $value, $fail) {
                foreach ($value as $key => $value) {
                    if (! in_array($key, array_keys(config('permissions')))){
                        return $fail('you insert invalid permissions');
                    }
                }
            }],
        ];
    }
}