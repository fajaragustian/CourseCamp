<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
    [
        'title',
        'price',
        'desc'
    ];
    // Menambahkan attribut jika yang sudah mendafatrkan course camp tidak dapat mendafatarkan course secara terus
    // menerus hanya cukup satu kali. fungsi ini akan di panggil di controller
    public function getIsRegisteredAttribute()
    {
        // Mengecek apakah user yang sedang login sudah memilih course ini
        if (!Auth::check()) {
            // jika ada maka akan bernilai false
            return false;
        }
        // namun jika belum ada pada data cekouts maka akan dicek di camps id berdasarkan user yang login
        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }
}
