<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'description' => ['sometimes'],
            'completed' => ['required','boolean'],
            'due_date' => ['required_if:completed,true', 'date']
        ];
    }
}
