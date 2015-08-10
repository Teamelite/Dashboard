<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minecraft extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'minecraft';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'unique_id', 'name', 'session_token'];

    /**
     * Timestamp the records.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The user who owns the minecraft profile.
     *
     * @return User
     */
    public function user() {
        return $this->belongsTo('App\Models\User')->first();
    }
}
