<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistance;
use Illuminate\Support\Facades\Auth;

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
        $assistance = Assistance::create([
            'date' => $request->date,
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->route('assistances.index');
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
