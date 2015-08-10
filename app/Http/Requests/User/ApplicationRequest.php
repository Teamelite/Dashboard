<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationRequest extends Request
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
            "skillset" => [
                "required",
            ],
            "tool_experience" => [
                "required",
            ],
            "team_experience" => [
                "required",
            ],
            "builds" => [
                "required",
            ],
            "reason" => [
                "required",
            ],
            "other" => [
                "required",
            ],
        ];
    }
}
