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
        'glossary_item_id',
        'added_by',
        'belongs_to',
        'validity_starts',
        'validity_ends',
    ];

    protected $casts = [
        'price' => 'float',
        'unite_for_sale' => 'integer',
        'glossary_item_id' => 'integer',
    ];

    public function glossaryItem()
    {
        return $this->belongsTo(GlossaryItem::class);
    }
}
