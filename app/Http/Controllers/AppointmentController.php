<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = auth()->user();  // getting the current user
    
    // method isAdmin definied earlier in model user
    if ($user->isAdmin()) {
        // Admin view
        $appointments = Appointment::paginate(5); 
        return view('admin.view_appointments', compact('appointments'));
    } else {
        // User view
        $user_appointments = $user->appointments()->get();
        return view('user.view_appointments', compact('user_appointments'));
    }
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'date' => 'required|date',
            'doctor_id_1' => 'required|exists:doctors,doctor_id',
            'doctor_id_2' => 'nullable|exists:doctors,doctor_id',
            'message' => 'nullable|string',
        ]);

        $appointment = Appointment::create([
            'user_id' => auth()->user()->id, // Assuming a user is logged in
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'date' => $validatedData['date'],
            'message' => $validatedData['message'],
            'status' => 'Pending', // Assuming a default status
        ]);

        // Attach doctors to the appointment
    $appointment->doctors()->attach([$request->input('doctor_id_1')]);

    if ($request->input('doctor_id_2')) {
        $appointment->doctors()->attach([$request->input('doctor_id_2')]);
    }

    return redirect()->back()->with('message','Appointment Request Sucessful!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           $appointment = Appointment::findOrFail($id);
    // Load the view to show the appointment details
    return view('appointment.show', compact('appointment'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all(); // Get a list of all doctors
    
        return view('appointment.edit_appointment', compact('appointment', 'doctors'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'date' => 'required|date',
            'doctor_id_1' => 'required|exists:doctors,doctor_id',
            'doctor_id_2' => 'nullable|exists:doctors,doctor_id',
            'message' => 'nullable|string',
        ]);
    
        $appointment = Appointment::findOrFail($id);
    
        // Update appointment fields
        $appointment->update($validatedData);
    
        // Detach previous doctors
        $appointment->doctors()->detach();
    
        // Attach new doctors
        $appointment->doctors()->attach([$request->input('doctor_id_1')]);
    
        if ($request->input('doctor_id_2')) {
            $appointment->doctors()->attach([$request->input('doctor_id_2')]);
        }
    
        return redirect()->back()->with('message', 'Appointment updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
    
        // Detach doctors associated with the appointment
        $appointment->doctors()->detach();
    
        $appointment->delete();
    
        return redirect()->back()->with('message', 'Appointment deleted successfully!');
    }

    public function approve($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'Approved';
    $appointment->save();

    return redirect()->back();
}

public function cancel($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'Cancelled';
    $appointment->save();

    return redirect()->back();
}
}
