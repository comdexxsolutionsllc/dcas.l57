<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailgunRequest extends FormRequest
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
            'Date'               => 'required|date',
            'From'               => 'required|string',
            'Message-Id'         => 'required|unique:inbound_emails,message_id',
            'body-plain'         => 'required',
            'domain'             => 'required|string',
            'from'               => 'required|email',
            'message-headers'    => 'required|string',
            'message-url'        => 'required|url',
            'recipient'          => 'required|email',
            'sender'             => 'required|email',
            'stripped-html'      => 'required',
            'stripped-signature' => 'nullable',
            'stripped-text'      => 'required',
            'subject'            => 'required',
            'timestamp'          => 'required|date',
            'token'              => 'required|string|unique:inbound_emails,token',
        ];
    }
}
