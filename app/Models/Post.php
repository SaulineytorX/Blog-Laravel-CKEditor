<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //Relación uno a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class); //Relacion de uno a muchos
    }

    public function category(){
        return $this->belongsTo(Category::class); //Relacion de uno a muchos
    }


    //Relacion muchos a muchos

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relación 1 a 1 polimorfica

    public function image(){
        return $this->morphOne(Image::class,'imageable');

    }
    public function images()
{
    return $this->hasMany(Image::class);
}

}
