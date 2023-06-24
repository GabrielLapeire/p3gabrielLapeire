<a href="../dashboard"><button>Volver</button></a> <br>
<form action="{{route('students.store')}}" method="POST">
    @csrf
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Cumpleaños</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" required></th>
                <th><input name="last_name" type="text" required></th>
                <th><input name="dni" type="text" required></th>
                <th><input name="birthday" type="datetime" required></th>
                <th><input name="status" type="radio" id="true" value="1" required>
                    <label for="true">true</label>
                    <input name="status" type="radio" id="false" value="0">
                    <label for="false">false</label>
                </th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>