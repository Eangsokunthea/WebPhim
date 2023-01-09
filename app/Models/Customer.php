<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = [
        'name','email','phone_no','password',
    ];
    
    protected $table = 'customers';
    
    public function rating(){
        return $this->hasMany(Rating::class);
    }
}

