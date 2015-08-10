<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_resets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id'];

    /**
     * Add a timestamp to each record update.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Boot the model.
     */
    public static function boot()
    {
        static::creating($callback = function(PasswordReset $model)
        {
            $model->token = hash_hmac('sha256', Str::random(32), env('APP_KEY'));
        });
    }

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User')->first();
    }
}
