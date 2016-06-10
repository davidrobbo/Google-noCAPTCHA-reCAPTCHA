<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TicketFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        /*
        $name = $this->title;
        if ($name != "Dave") {
            return false;
        }
        
        return true;
        */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'g-recaptcha-response' => 'required',        
            ];
    }
}
