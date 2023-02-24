<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function movie_genre(){
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }  
    public function episode(){
        return $this->hasMany(Episode::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function rating(){
        return $this->hasMany(Rating::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }



    // public function customer(){
    //     return $this->belongsTo(Customer::class, 'created_by', 'id');
    // }

    // public function user(){
    //     return $this->belongsTo(User::class, 'created_by', 'id');
    // }

    // public function comments(){
    //     return $this->hasMany(Comment::class, 'movie_id', 'id');
    // }

    



}
