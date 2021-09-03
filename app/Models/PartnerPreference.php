<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    use HasFactory;
     protected $fillable = [
        
        'maritial_status',
        'salary_range',
        'job_type',
        'family_type',
        'user_id'
        
    ];
}
