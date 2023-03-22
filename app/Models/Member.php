<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = [
        'name',
        'userid',
        'email',
        'phone',
        'address',
        'vehicle',
        'total_amount',
        'paid_amount',
    ];

    use HasFactory;
}
