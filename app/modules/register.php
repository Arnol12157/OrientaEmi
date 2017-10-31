<?php
// configs
//include_once 'requires.php';
?>
<html>
<?php
// templates
include 'header_template.php';
?>
<body class="hold-transition register-page">
<!-- content -->
<div class="register-box">
    <div class="register-logo">
        <a href=""><b>O</b>V</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Registrate en OV</p>

        <form onsubmit="return false">
            <div class="form-group">
                <input type="text" class="form-control" id="nombresE" placeholder="Nombres" maxlength="150" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="apellidosE" placeholder="Apellidos" maxlength="150" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="ciE" placeholder="CI" required="" data-inputmask="'mask': ['9999999', '99999999']" data-mask>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="cursoE" placeholder="Curso y Paralelo" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="gestionE" placeholder="Gestion" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="telefonoE" placeholder="Telefono" required="" data-inputmask="'mask': ['999-9999' , '999-99999']" data-mask>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="emailE" placeholder="Email" maxlength="150" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="passE" placeholder="Contraseña" minlength="6" maxlength="10" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="verPassE" placeholder="Repetir contraseña" minlength="6" maxlength="10" required="">
            </div>
            <div class="form-group">
                <select class="form-control m-b" id="generoE">
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMENINO">Femenino</option>
                </select>
            </div>
            <button type="submit" id="btnEstudiante" class="btn btn-primary block full-width m-b">Registrarse</button>
            <p class="text-muted text-center"><small>Ya tienes una cuenta?</small></p>
            <div class="text-center">
                <span id="result"></span>
            </div>
            <a class="btn btn-sm btn-white btn-block" href="login.php">Ingresar</a>
        </form>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<?php
// templates
include 'scripts_template.php';
?>
</body>
</html>