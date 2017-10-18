<?php
// configs
include_once 'requires.php';
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
                <small><h4>Bienvenido a OrientaEmi</h4></small>
              </h1>
            </section>
<center><h3><b>Escuela Militar de Ingeniería</b></h3></center>
    <div class="box-header with-border">
          <center><img src="../template/dist/img/ima05.jpg"></center>
          </div>
            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
                  | Your Page Content Here |
                  -------------------------->

         <div class="row">
        <div class="col-md-6">
         
         <div class="bg-gray color-palette">
            <div class="box-header with-border" >
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Misión</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                      Formar y especializar profesionales de excelencia, con valores éticos, morales y cívicos; caracterizados por su responsabilidad social, espíritu emprendedor, liderazgo y disciplina; promoviendo internacionalización, interacción social e investigación científica y tecnológica para contribuir al desarrollo del Estado.
                                               
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-6">
          <div class="bg-gray color-palette">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Visión</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body clearfix">
             
                Ser la Universidad líder, especializada en Ingeniería y reconocida internacionalmente.               
                                                        
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
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
