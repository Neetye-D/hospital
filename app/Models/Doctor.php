<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = 'doctor_id';

    protected $fillable = [
        'doctor_name',
        'doctor_phone',
        'doctor_email',
        'speciality',
    ];
    
    
    public function appointments()
{
    return $this->belongsToMany(Appointment::class, 'appointment_doctor', 'doctor_id', 'appointment_id');
}


}
