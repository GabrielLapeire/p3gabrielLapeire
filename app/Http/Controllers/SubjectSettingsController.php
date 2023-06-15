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
    public function index()
    {
		$subjectSettings = SubjectSettings::all();
        return view('subjectSettings.index', compact('subjectSettings'));
    }

    public function subjectClass($id)
    {
        $subject = Subject::find($id);
        dd($subject->name);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjectSettings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subjectSettings = SubjectSettings::create([
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'time_limit' => $request->time_limit,
        ]);

        return redirect()->route('subjectSettings.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjectSettings = SubjectSettings::where('id', $id)->get();
        return view('subjectSettings.edit', compact('subjectSettings'));
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

        return redirect()->route('subjectSettings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubjectSettings::destroy($id);

        return redirect()->route('subjectSettings.index');
    }
}
