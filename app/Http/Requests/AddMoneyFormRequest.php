<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMoneyFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:3|max:100'
        ];
    }
}
