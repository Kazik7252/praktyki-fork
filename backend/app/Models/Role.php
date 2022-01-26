<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    use HasFactory;

    // TODO relacje z użytkownikami i tabelą user_role
}
