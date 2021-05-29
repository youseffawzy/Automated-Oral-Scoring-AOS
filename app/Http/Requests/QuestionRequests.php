<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequests extends FormRequest
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

            "q_text" =>"required ",
            "pority" =>"required",
        ];
    }
    public function messages()
{
    return [
        'q_text.required' => 'A name is required **',
        'q_text.unique' => 'A name is unique **',
        'pority.required' =>'a prority of question must entered',
        
    ];
}

}
