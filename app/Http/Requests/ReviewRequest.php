<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'users_id' => 'unique:applications_users,users_id,',
            'title' => 'required|max:30',
            'good_point' => 'required|max:300|min:10',
            'improvement_point' => 'required|max:300|min:10',
            'evaluation' => 'required',
        ];
    }
}
