<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function topicAuthor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    //TODO określenie relacji między pozostałymi obiektami


}
