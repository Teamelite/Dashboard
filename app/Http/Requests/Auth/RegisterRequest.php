<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $date = new Carbon();
        return [
            "name" => [
                "required",
                "max:26",
            ],
            "birthday" => [
                "required",
                "date",
                "date-format:d-m-Y",
                "before:" . $date->subYears(13)->format("d-m-Y"),
            ],
            "country" => [
                "required",
                "exists:countries,id",
            ],
            "email" => [
                "required",
                "email",
                "unique:users,email",
                "confirmed",
            ],
            "password" => [
                "required",
                "min:6",
                "confirmed",
            ],
        ];
    }
}
