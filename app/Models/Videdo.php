<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videdo extends Model
{
    use HasFactory;
    protected $fillable = ['video','name','description'];
}
