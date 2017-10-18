<?php
// configs
include_once 'requires.php';
include 'Ctrl_Estudiante.php';
?>
<html>
<?php
// templates
include 'header_template.php';
?>
<body class="hold-transition skin-red sidebar-mini">
<!-- content -->
<div class="wrapper">
    <?php include 'navbar_header_template.php'?>
    <?php include 'navbar_template.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> 
                <small><h4>Estudiantes Registrados</h4></small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box">
                  <!-- /.box-header -->
                <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Curso</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Test de Interes</th>
                            <th>Test de Aptitud</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($estu as $es)
                        {
                            echo '<tr>
                                        <td>'.$es["ci"].'</td>
                                        <td>'.$es["nombres"].'</td>
                                        <td>'.$es["apellidos"].'</td>
                                        <td>'.$es["curso"].'</td>
                                        <td>'.$es["telefono"].'</td>
                                        <td>'.$es["email"].'</td>
                                        <td class="text-center"><a type="button" class="btn btn-warning" href="pdf_detalle_test.php?id='.$es["ci"].'">Ver test</a></td>
                                        <td class="text-center"><a type="button" class="btn btn-info" href="pdf_detalle_test.php?id='.$es["ci"].'">Ver test</a></td>
                                      </tr>';
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'footer_template.php'?>
</div>
</body>
<?php
// templates
include 'scripts_template.php';

?>
</html>
