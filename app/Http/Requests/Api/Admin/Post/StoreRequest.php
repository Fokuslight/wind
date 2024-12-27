<?php

namespace App\Http\Requests\Api\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required|string',
            'title' => 'required|string|max:255|unique:posts,title',
            'category' => 'required|string',
            'tag' => 'required|string',
            'image_path' => 'required|string',
            'description' => 'required|string',
            'published_at' => 'nullable|date_format:Y-m-d',
            'likes' => 'nullable|integer',
            'views' => 'nullable|integer',
            'status' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ];
    }

}

