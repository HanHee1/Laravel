<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'userid' => 'required|min:6|max:12|unique:users|string',
            'password' => 'required|min:3|max:10|confirmed',
            'email' => 'required|email',
            'tel' => 'required|min:11|max:11|integer'
        ];
    }

    public function messages()
    {
        return [
            'userid.required' => '아이디를 입력해주세요.',
            'userid.min' => '아이디는 6~12자 까지 입력해주세요.',
            'userid.max' => '아이디는 6~12자 까지 입력해주세요.',
            'password.required' => '비밀번호를 입력해주세요.',
            'password.min' => '비밀번호는 3~10자 까지 입력해주세요.',
            'password.max' => '비밀번호 3~10자 까지 입력해주세요.',
            'email.required' => '이메일을 입력해주세요.',
            'tel.required' => '전화번호를 입력해주세요',
            'tel.min' => '전화번호는 숫자만 11자 입력해주세요.',
            'tel.max' => '전화번호는 숫자만 11자 입력해주세요.',
            'tel.integer' => '전화번호는 숫자만 11자 입력해주세요.',
        ];
    }
}
