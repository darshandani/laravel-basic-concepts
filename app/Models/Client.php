<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $fillable = [
        'name', 'avtar', 'department', 'designation'
    ];

    public function ClientSalary()
    {
        return $this->hasOne(ClientSalary::class);
    }
}
