<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class test extends Model
{
    use HasFactory;
    use Notifiable;


    protected $table = "test";
    protected $fillable = [
        'name','email','phone'
    ];
}
