<?php

namespace App\Http\Requests;

use App\Domain\Enums\Pastes\AccessMode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class PasteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'string',
            'lang'=>'string',
            'code'=> 'string',
            'access_mode'=>[
                'required',
                Rule::in([
                    AccessMode::PRIVATE,
                    AccessMode::PUBLIC,
                    AccessMode::UNLISTED
                ]),
                ],
            'expiration_time'=>'integer'
        ];
    }
}
