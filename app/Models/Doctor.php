<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'profile_pic',
        'About',
        'Education_Qualification',
        'specialization',
        'phone_number',
        'hospital',
        'dateofbirth',
        'address',
        'lga',
        'state',
        'Country',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
