<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // 이 값은 현재 유저가 저장이 가능한 지 검사하는 역할입니다만 지금은 유저의 권한 개념이 없으므로 true.
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
            'name' => 'required|max:63',
            'content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '제목이 비어있습니다.',
            'name.max' => '제목은 63자 이하입니다.',
            'content.required' => '내용이 비어있습니다.',
            'content.max' => '내용은 255자 이하입니다.',
        ];
    }
}
