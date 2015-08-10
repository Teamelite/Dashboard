<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'birthday', 'country', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes to be treated as dates.
     *
     * @var array
     */
    protected $dates = ['birthday'];

    /**
     * Instantiate the birthday as a Carbon instance.
     *
     * @param $birthday
     */
    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat("d-m-Y", $birthday);
    }

    /**
     * Hash the password before database entry.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @return App\Models\Application
     */
    public function application()
    {
        return $this->hasMany('App\Models\Application')->get();
    }

    /**
     * @return App\Models\User\EmailChangeRequest
     */
    public function emailChangeRequest()
    {
        return $this->hasMany('App\Models\User\EmailChangeRequest')->whereNotNull('token')->get();
    }

    /**
     * @return App\Models\Minecraft
     */
    public function minecraft()
    {
        return $this->hasOne('App\Models\Minecraft')->first();
    }

}
