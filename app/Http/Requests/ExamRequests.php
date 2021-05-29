<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequests extends FormRequest
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
            //
            "name" =>"required |unique:exam",
          "duration" => "required ",
          "ex_start" => "required ",
          "ex_end" => "required ",
          "idexam" => "required ",
          "degree" => "required ",
          "course_code" => "required ",

          
        ];
    }
    /*
    public function messages()
{
    return [
        'name.required' => 'A name is required **',
        'name.unique' => 'A name is unique **',
        'course_code.required'  => 'A course_code is required',
    ];
}*/
}
