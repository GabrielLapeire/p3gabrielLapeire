<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\SubjectSettings;
use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Support\Facades\DB;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$assistances = DB::table('assistances')
            ->join('students', 'assistances.student_id', '=', 'students.id')
            ->join('subjects', 'assistances.subject_id', '=', 'subjects.id')
            ->select('students.last_name','students.name as first_name', 'subjects.name',
            'assistances.id', 'assistances.date')
            ->get();
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
        $time = $now->parse();
        $weekday = $now->weekday();
        $day = Day::where('id', $weekday)->get();
        $day = $day[0]->name;
        
        $subjects = $student->subjects;
        foreach ($subjects as $subject) {
            $subjectSettings = $subject->subjectSettings;
            foreach ($subjectSettings as $subjectSetting){
                $start = Carbon::parse($subjectSetting->time_start);
                $limit = Carbon::parse($subjectSetting->time_limit);
                $inClass = $time->between($start, $limit);
                if ($subjectSetting->day == $day && $inClass) {
                    $ok = 'ok';
                    Assistance::create([
                    'date' => $date,
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    ]);
                    
                    return redirect()->route('assistances.index');
                }
            }
        }
        if (empty($ok)) {
            return response('El estudiante no tiene ninguna materia en este horario');
        }
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
        $assistance = DB::table('assistances')
            ->where('assistances.id', $id)
            ->join('students', 'assistances.student_id', '=', 'students.id')
            ->join('subjects', 'assistances.subject_id', '=', 'subjects.id')
            ->select('students.last_name','students.name as first_name', 'subjects.name',
            'assistances.id', 'assistances.date')
            ->get();
        return view('assistances.edit', compact('assistance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assistance = DB::table('assistances')
        ->where('assistances.id', $id)
        ->join('students', 'assistances.student_id', '=', 'students.id')
        ->join('subjects', 'assistances.subject_id', '=', 'subjects.id')
        ->select('students.last_name','students.name as first_name', 'subjects.name',
        'assistances.id', 'assistances.date')
        ->get();

        $student_id = DB::table('students')
        ->where('students.name', $request->first_name)
        ->where('students.last_name', $request->last_name)
        ->select('students.id')
        ->get();
        $subject_id = DB::table('subjects')
        ->where('subjects.name', $request->subject)
        ->select('subjects.id')
        ->get();

        dd($student_id);

        // $assistance = Assistance::find($id);
        // $assistance->date = $request->date;
        // $assistance->student_id = $student_id;
        // $assistance->subject_id = $subject_id;
        // $assistance->save();

        // return redirect()->route('assistances.index');
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
