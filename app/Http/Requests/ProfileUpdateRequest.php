<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ユーザーの認証を確認する場合は適切な条件を設定
    }

    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $this->user()->id],
            'mbti' => ['nullable', 'string', 'max:4'],
            'introduction' => ['nullable', 'string', 'max:500'],
            'hometown' => ['nullable', 'string', 'max:255'],
        ];
    }
}
