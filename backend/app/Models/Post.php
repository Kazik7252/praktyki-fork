<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function postAuthor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function motherTopic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

}
