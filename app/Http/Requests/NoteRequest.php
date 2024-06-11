<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [
                        'id' => 'required|exists:notes,id',
                    ];
                }

            case 'POST': {
                    return [
                        'note' => 'required',
                        'user_id' => 'nullable|exists:users,id',

                    ];
                }

            case 'PUT': {
                    return [
                        'name' => 'string',
                        'users' => 'nullable|exists:users,id',
                    ];
                }
        };
    }
}
