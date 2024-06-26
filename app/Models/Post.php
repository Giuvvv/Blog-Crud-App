<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'user_name'];

    protected $table = 'posts';

    public function userId() {
        return $this->belongsTo(User::class);
    }
}
