<a href="dashboard"><button>Volver</button></a> <br>
<form action="{{route('subjectSettings.store')}}" method="POST">
    @csrf
    <table border="1">
        <thead>
            <tr>
                <th>Dia</th>
                <th>Hora de inicio</th>
                <th>Hora de cierre</th>
                <th>Hora limite para asistencia <br>
                    (por defecto se usa la hora de cierre)
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text"></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>