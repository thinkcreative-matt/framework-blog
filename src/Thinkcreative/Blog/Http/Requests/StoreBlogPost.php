<?php

namespace Thinkcreative\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|max:100|',
            'slug' => [
                Rule::unique('blog', 'slug')->ignore(request()->slug, 'slug')
            ],
            'intro' => 'required|max:255',
            'body' => 'required|min:50',
            'status' => 'required|in:draft,published,unpublished'
        ];
    }
}
