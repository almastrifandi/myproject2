<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['teacher','owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'path_trailer' => 'required|string|max:255',
            'about' => 'required|string',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,svg',
            'category_id' => 'required|integer',
            // 'course_keypoints' => 'required|array',
            'course_keypoints.*' => 'required|string|max:255',
        ];
    }
}