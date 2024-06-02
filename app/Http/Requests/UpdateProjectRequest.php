<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'name' => 'required',
            'name' => ['required', Rule::unique('projects')->ignore($this->project->id)],
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => 'nullable|image|max:1000',
            'description' => 'nullable',
            'project_url' => 'nullable',
            'source_code_url' => 'nullable'
        ];
    }
}
