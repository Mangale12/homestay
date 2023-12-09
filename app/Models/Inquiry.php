<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','country','email','phone','message','room_type','arrival_date','departure_date','adults','children','pickup','status'
    ];

    public function countries(){
        return $this->belongsTo(Country::class, 'country', 'id');
    }

}
