<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Correo Electrónico</title>
<link rel="stylesheet" href="../CSS/recuperar.css">
</head>
<body>

<div class="container">
    <h2>Escriba un correo electronico</h2>
    <form id="emailForm">
        <div class="form-group">
            <label for="email">Correo Electrónico (Gmail):</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="form-group">
            <button type="button" id="comprobar">Enviar</button>
        </div>
    </form>
</div>
<script src="../JS/script_recuperar.js"></script>
</body>
</html>
