<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions_table';
    protected $fillable = [
        'user_id',
        'menu_id',
        'view',
        'edit',
        'add',
        'delete',
        'show_in_menu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

