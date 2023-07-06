<?php
/**php artisan make:controller StudentController --resource */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Career;
use App\Models\Subject;
use App\Traits\AuditTrait;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    use AuditTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $careers = Career::all();
        $subjects = Subject::all();
        return view('students.create', compact('careers', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->last_name =$request->last_name;
        // $student->dni = $request->dni;
        // $student->birthday = $request->birthday;
        // $student->status = $request->status;
        // $student->save();
        
        //metodo alternativo
        $student = Student::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'dni' => $request->dni,
            'birthday' => $request->birthday,
            'status' => $request->status,
        ]);

        // insertar datos en la tabla intermedia
        $subject_ids = $request->subject_list;
        $student->subjects()->attach($subject_ids);

        $this->logChanges('alta', 'A');

        return redirect()->route('students.index');
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
        $student = Student::where('id', $id)->get();
        $subjects = Subject::all();
        $studentSubjects = $student[0]->subjects;
        
        return view('students.edit', compact('student', 'subjects', 'studentSubjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->last_name =$request->last_name;
        $student->dni = $request->dni;
        $student->birthday = $request->birthday;
        $student->status = $request->status;
        $student->save();

        // actualizar datos de la tabla intermedia
        $subject_ids = $request->subject_list;
        $student->subjects()->sync($subject_ids);

        $this->logChanges('modificación', 'M',);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);

        $this->logChanges('baja', 'B');

        return redirect()->route('students.index');
    }
}
