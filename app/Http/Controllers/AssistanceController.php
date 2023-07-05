<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\SubjectSettings;
use Carbon\Carbon;
use App\Models\Day;
use exception;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$assistances = Assistance::all();
        return view('assistances.index', compact('assistances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assistances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::where('dni', $request->dni)->first();
        
        if (empty($student)) {
            return response('El estudiante no existe');
        }
        
        $now = Carbon::now();
        $date = $now->toDateString();
        $time = $now->format('H:i:s');
        $weekday = $now->weekday();
        $day = Day::where('id', $weekday)->get();
        
        $subjects = $student->subjects;
        foreach ($subjects as $subject) {
            $subjectSettings = $subject->subjectSettings;
            foreach ($subjectSettings as $subjectSetting){
                // dd($subjectSetting->time_limit);
                if ($subjectSetting->day == $day &&
                $time >= $subjectSetting->time_start &&
                $time <= $subjectSetting->time_limit) {
                    return response('ok');
                }
            }
        }

        // return response('El estudiante no tiene ninguna materia en este horario');

        // $assistance = Assistance::create([
        //     'date' => $date,
        //     'student_id' => $student->id,
        //     'subject_id' => $subjects->id,
        // segun dia y hora
        // ]);

        // return redirect()->route('assistances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assistance = Assistance::where('id', $id)->get();
        return view('assistances.edit', compact('assistance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assistance = Assistance::find($id);
        $assistance->date = $request->date;
        $assistance->student_id = $request->student_id;
        $assistance->subject_id = $request->subject_id;
        $assistance->save();

        return redirect()->route('assistances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Assistance::destroy($id);
        return redirect()->route('assistances.index');
    }
}
