<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'camp_id',
        'card_number',
        'cvc',
        'is_paid',
        'expired',
    ];
    // Custom Attribute expired yang akan di input kedalam database
    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }
    public function Camp()
    {
        return $this->belongsTo(Camp::class);
    }
}
