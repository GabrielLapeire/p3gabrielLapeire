<a href="../dashboard"><button>Volver</button></a> <br>
<form action="{{route('careers.store')}}" method="POST">
    @csrf
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input name="name" type="text" required></th>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="guardar">
</form>