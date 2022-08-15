<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampBenetfit extends Model
{
    use HasFactory;
    protected $fillable =[
        'camp_id',
        'name',
    ];
}
