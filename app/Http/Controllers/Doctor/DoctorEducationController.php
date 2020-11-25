<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor\DoctorEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorEducationController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'school' => 'required',
            'degree' => 'required',
            'description' => 'required',
            'start_at' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $doctor = new DoctorEducation();
        $doctor->school = $request->school;
        $doctor->degree = $request->degree;
        $doctor->description = $request->description;
        $doctor->start_at = $request->start_at;
        $doctor->end_at = $request->end_at;
        $doctor->doctor_id = Auth::user()->id;
        $doctor->save();


        return response()->json([
                'success' => true,
                'doctor' => $doctor
        ]);

    }
}
