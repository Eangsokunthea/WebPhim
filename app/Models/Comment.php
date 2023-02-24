<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'comment', 'comment_name', 'comment_date','comment_movie_id','comment_parent_comment','comment_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'comments';

    public function movie(){
        return $this->belongsTo(Movie::class, 'comment_movie_id');
    }


}
