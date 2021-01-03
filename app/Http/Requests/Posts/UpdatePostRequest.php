<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|max:255|unique:posts,title,' . $this->post->id,
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
}
