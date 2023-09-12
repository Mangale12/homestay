<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','parent_id','status','featured','slug','image'];

    public function nav(){
        return $this->belongsTo(Menu::class, 'menu','id');
    }
    public function subCategory(){
        return $this->hasMany(SubCategory::class,'parent_id','id');
    }

}
