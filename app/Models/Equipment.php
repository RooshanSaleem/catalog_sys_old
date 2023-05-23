<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Equipment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'code',
        'short_description',
        'detailed_description',
        'price',
        'unite_for_sale',
    ];

    protected $casts = [
        'price' => 'float',
        'unite_for_sale' => 'integer',
    ];
}
