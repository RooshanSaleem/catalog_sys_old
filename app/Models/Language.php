<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Language extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'languages';
    protected $primaryKey = 'id';
    protected $fillable = ['language'];

    // Define the relationship with Glossary model
    public function glossary()
    {
        return $this->hasMany(Glossary::class, 'language_id');
    }
}
