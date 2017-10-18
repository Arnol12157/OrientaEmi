<?php
// configs
include_once 'requires.php';
include 'Ctrl_Carrera.php';
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
                <div class="box-header">
                    <h3 class="box-title">Carreras que ofrece la EMI</h3>
                </div>
             </section>
        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Carrera</th>
                            <th>Categoria</th>
                            <th>Acreditada</th>
                            <th>Informacion</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($carr as $ca)
                            {
                                if($ca["acreditada"]=="SI")
                                {
                                    echo '<tr>
                                        <td>'.$ca["nombre"].'</td>
                                        <td>'.$ca["categoria"].'</td>
                                        <td><span class="label label-success">'.$ca["acreditada"].'</span></td>
                                        <td><a href="#" class="btn btn-block btn-warning btn-xs"><i class="fa fa-credit-card"></i> Ver</a></td>
                                        
                                      </tr>';
                                }
                                else
                                {
                                    echo '<tr>
                                        <td>'.$ca["nombre"].'</td>
                                        <td>'.$ca["categoria"].'</td>
                                        <td><span class="label label-danger">'.$ca["acreditada"].'</span></td>
                                        <td><a href="#" class="btn btn-block btn-warning btn-xs"><i class="fa fa-credit-card"></i> Ver</a></td>
                                      </tr>';
                                }
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

