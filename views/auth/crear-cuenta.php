<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/crear-cuenta" method="POST" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input value="<?php echo s($usuario->nombre); ?>" type="text" id="nombre" name="nombre" placeholder="Tú Nombre" />
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input value="<?php echo s($usuario->apellido); ?>" type="text" id="apellido" name="apellido" placeholder="Tú Apellido" />
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input value="<?php echo s($usuario->telefono); ?>" type="tel" id="telefono" name="telefono" placeholder="Tú Teléfono" />
    </div>
    <div class="campo">
        <label for="email">E-mail</label>
        <input value="<?php echo s($usuario->email); ?>" type="email" id="email" name="email" placeholder="Tú E-mail" />
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Tú Password" />
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>