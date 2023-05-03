<?php
/**php artisan make:controller StudentController --resource */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Traits\AuditTrait;

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
        return view('students.create');
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

        $this->logChanges('alta', 'A', 1);

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
        return view('students.edit', compact('student'));
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

        $this->logChanges('modificación', 'M', 1);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);

        $this->logChanges('baja', 'B', 1);

        return redirect()->route('students.index');
    }
}
