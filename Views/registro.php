<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/registro.css">
</head>

<body>

    <form action="" id="frmEmpleados">
        <h2>Registro</h2>
        <input type="text" id="nombres" name="nombres" placeholder="Nombre" required>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
        <input type="text" id="nom_user" name="nom_user" placeholder="Nombre de usuario" required>
        <input type="password" id="pass_user" name="pass_user" placeholder="Contraseña" required>
        <button type="button" id="registrar">Entrar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="../JS/registro.js"></script>
</body>

</html>