<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'completed' => ['sometimes', 'bool'],
            'due_date' => ['sometimes', 'date'],
        ];
    }
}
