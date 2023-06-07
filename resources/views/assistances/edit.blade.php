<a href="dashboard">Volver</a> <br>
<form action="{{route('assistances.update', $assistance[0]->id)}}" method="POST">
    @csrf
    @method('put')
    <table border="1">
        <thead>
            <tr>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="date" type="date" value="{{$assistance[0]->date}}"></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>