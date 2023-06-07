<a href="dashboard">Volver</a> <br>
<form action="{{route('assistances.store')}}" method="POST">
    @csrf
    <h3>DNI del alumno</h3>
    <input name="dni" type="text" required>
    <input type="submit" value="guardar">
</form>