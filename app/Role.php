<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description', 'power'];

    /**
     * Check if a role has a higher power of authority.
     *
     * @param Role $role
     * @return bool
     */
    public function higher(Role $role)
    {
        return $role->power < $this->power;
    }

    /**
     * Check if a role has a lower power of authority.
     *
     * @param Role $role
     * @return bool
     */
    public function lower(Role $role)
    {
        return $role->power > $this->power;
    }
}
