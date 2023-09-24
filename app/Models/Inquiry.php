<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','country','email','phone','message','room_type','arrival_date','departure_date','adults','children','pickup','status'
    ];
}
