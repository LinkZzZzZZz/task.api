<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'int', 'exists:tasks,id'],
            'title' => ['required', 'string', 'min:3'],
            'description' => ['sometimes'],
            'completed' => ['required','boolean'],
            'due_date' => ['required_if:completed,true', 'date']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('task'),
        ]);
    }
}
