<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentRequest extends FormRequest
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
            'comment' => 'required|string',
            'post_id' => 'required|exists:posts,id',
            'user_id' => ['required', function($attribute, $value, $fail) {
                if ($value != Auth::user()->id) {
                    return $fail('invalid user');
                }
            }],
            'comment_id' => 'nullable|exists:comments,id',
            'content' => 'required|string|max:300'
        ];
    }
}
