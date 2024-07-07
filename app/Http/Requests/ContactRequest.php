<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|max:250',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vous devez rentrer votre nom.',
            'email.required' => 'Vous devez rentrer votre email',
            'email.email' => 'Le format de votre adresse email est incorrect',
            'subject.required' => 'Vous devez rentrer un sujet a votre message',
            'message.required' => 'Le contenu de votre message ne peut etre vide',
            'captcha.captcha' => "Le captcha n'est pas bon."
        ];
    }
}
