<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectSettings;
use Illuminate\Support\Facades\Auth;

class SubjectSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$subject = Subject::find($id);
        $subject_id = $subject->id;
        $subjectSettings = $subject->subjectSettings;
        return view('subjectSettings.index', compact('subjectSettings', 'subject_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $subject = Subject::find($id);
        $subject_id = $subject->id;
        return view('subjectSettings.create', compact('subject_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SubjectSettings::create([
            'subject_id' => $request->subject_id,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'time_limit' => $request->time_limit,
        ]);

        $subject_id = $request->subject_id;
        return redirect()->route('subjectSettings.index', ['id' => $subject_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjectSetting = SubjectSettings::where('id', $id)->get();
        return view('subjectSettings.edit', compact('subjectSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subjectSettings = SubjectSettings::find($id);
        $subjectSettings->day = $request->day;
        $subjectSettings->time_start = $request->time_start;
        $subjectSettings->time_end = $request->time_end;
        $subjectSettings->time_limit = $request->time_limit;
        $subjectSettings->save();

        $subject_id = $request->subject_id;
        return redirect()->route('subjectSettings.index', ['id' => $subject_id]);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subjectSettings = SubjectSettings::find($id);
        $subject_id = $subjectSettings->subject_id;

        SubjectSettings::destroy($id);

        return redirect()->route('subjectSettings.index', ['id' => $subject_id]);
    }
}
