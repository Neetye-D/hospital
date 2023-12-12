<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $doctors = Doctor::all();
        $doctors = Doctor::paginate(3); 
        return view('admin.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_doctor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        // Debugging statement to Check if data is being received
        // dd($request->all());

        $storeData = $request->validate([
            'doctor_name' => 'required',
        'doctor_phone' => 'required',
        'doctor_email' => 'required|email',
        'speciality' => 'required'
        ]);
        $doctor = Doctor::create($storeData);
    
        return redirect()->back()->with('message','Doctors Added Successfully');
    }
    


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
    return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // $doctor_id also works = public function edit($doctor_id)
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.edit_doctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $storeData = $request->validate([
        'doctor_name' => 'required',
        'doctor_phone' => 'required',
        'doctor_email' => 'required|email',
        'speciality' => 'required'
    ]);

    $doctor = Doctor::find($id);
    $doctor->update($storeData);

    return redirect('/view_doctors')->with('success', 'Doctor details have been updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $doctor = Doctor::find($id);
    $doctor->delete();
    return redirect()->route('admin.index')->with('success', 'Doctor has been deleted.');
}
}
