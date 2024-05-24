<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admission extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = "admission";
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'place_of_birth',
        'religion',
        'gender',
        'street_address',
        'city',
        'state',
        'last_school_name',
        'medium_of_instruction',
        'last_school_result',
        'reason_for_leaving',
        'leaving_certificate',
        'mark_list_report_card',
        'medical_certificate',
        'agree_terms'
    ];
}
