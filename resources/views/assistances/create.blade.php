<a href="dashboard">Volver</a> <br>
<form action="assistances/create" method="POST">
    @csrf
    <h3>DNI del alumno</h3>
    <input type="text" required>
    <button type="submit">guardar</button>
</form>