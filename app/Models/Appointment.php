<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'date',
        'message',
        'status'
    ];



    //One-to-Many Relationship (User to Appointments):
    //Each user can have multiple appointments.
    //Each appointment belongs to one user.
    public function user()
{
    return $this->belongsTo(User::class);
}
    

    //Many-to-Many Relationship (Appointments to Doctors):
    //Each appointment can have multiple doctors.
    //Each doctor can be associated with multiple appointments.
    //fpr this i have  a pivot table called appointment_doctor 
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'appointment_doctor', 'appointment_id', 'doctor_id');
    }

}
