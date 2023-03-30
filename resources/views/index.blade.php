<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indice</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <hr>
    <input type="button" value="saludo" onclick="saludo()">
    <input type="button" value="volver" onclick="volver()">
    <script>
        function saludo() {
            return alert("que tenga un buen día");
        };
        function volver() {
            return view('welcome');
        };
    </script>
</body>
</html>