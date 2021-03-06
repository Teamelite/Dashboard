<?php

namespace App\Http\Requests\User\Account;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class SettingsUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => [
                "required",
                "max:26",
            ],
            "country" => [
                "required",
                "exists:countries,id",
            ],
        ];
    }
}
