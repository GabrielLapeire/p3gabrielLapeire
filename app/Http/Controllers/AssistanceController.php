<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\SubjectSettings;
use Carbon\Carbon;
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
        try {
            $student = Student::where('dni', $request->dni)->first();
            // dd($student->name);
            $subjects = $student->subjects;
            // dd($subjects);
        } catch(exception) {
            print('<h2>El estudiante no existe<h2>');
        }

        $now = Carbon::now('America/Buenos_Aires');
        $date = $now->toDateString();
        $time = $now->toTimeString();
        $day = $now->weekday();     //numero
        // $day = $now->format('l');   //nombre (ingles)
        // dd($day);
        
        try {
            $subjectSettings = SubjectSettings::where('day', $day);
            // unificar formato de day
            // comparar tambien horarios
        } catch (exception) {
            print('<h2>El estudiante no tiene ninguna materia en este horario<h2>');
        }

        // buscar estudiante por dni (error si no existe)
        // agrupar materias de estudiante
        // fecha y hora actual

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
