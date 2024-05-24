<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSalary extends Model
{
    use HasFactory;

    protected $table = "clientsalary";
    protected $fillable = [
        'client_id',
        'salary',
        'da',
        'hra',
        'pf',
        'net_salary'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public $timestamps = false;
}
