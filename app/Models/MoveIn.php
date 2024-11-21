<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'phone',
        'rental_type',
        'marketing_desc',
        'cancelled',
        'date',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

}
