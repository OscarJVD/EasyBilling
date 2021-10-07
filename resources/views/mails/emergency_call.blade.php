<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Usuario en EasyPilling</title>
</head>
<body>
    <p>Hola! usuario generado a las {{ $user->created_at }}.</p>
    <p>Su clave:</p>
    <ul>
        <li>Nombre: {{ $user->user->password }}</li>
    </ul>
</body>
</html>