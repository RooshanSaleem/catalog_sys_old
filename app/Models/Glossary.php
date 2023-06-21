<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Glossary extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'glossary';
    protected $primaryKey = 'id';
    protected $fillable = ['language_id', 'item_id', 'item_name', 'belongs_to'];

    // Define the relationship with Language model
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
