<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Menu extends Model
{
    protected $fillable = ['menu_item'];

    public function permissions()
    {
    return $this->hasMany(Permission::class);
    }


}
