<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../template/dist/img/icono.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $dataUser['nombres'] ?></p>
                <p><?php echo $dataUser['apellidos'] ?></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <?php
            if($tipo=="1") // Estudiante
            {
                echo '
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <!-- Optionally, you can add icons to the links -->
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> <span>Test de Orient. Vocacional</span>
                                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="informe_test.php">Informe del Test</a></li>
                                    <li><a href="comenzar_test.php">Interes</a></li>
                                    <li><a href="comenzar_test_aptitudes.php">Aptitudes</a></li>
                                </ul>
                            </li>
                            <li><a href="carreras_estudiar.php"><i class="fa fa-link"></i> <span>Carreras a Estudiar</span></a></li>
                            <li><a href="historial_prueba.php"><i class="fa fa-link"></i> <span>Historial de la Prueba</span></a></li>
                            <li><a href="tutoEstud.php"><i class="fa fa-link"></i> <span>Ayuda</span></a></li>
                        </ul>
                ';
            }
            elseif($tipo=="0") // Psicologia
            {
                echo '
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <!-- Optionally, you can add icons to the links -->
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> <span>Nuevo Usuario</span>
                                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                                </a>
                                <ul class="treeview-menu">
                                    <!--
                                    <li><a href="informe_test.php">Registrar Estudiante</a></li>
                                    -->
                                    <li><a href="register_psicologo.php">Registrar Psicologo</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> <span>Lista de Usuarios</span>
                                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="estudiantes_registrados.php">Estudiantes Registrados</a></li>
                                    <li><a href="psicologos_registrados.php">Psicologos Registrados</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="reportes.php"><i class="fa fa-link"></i> <span>Reportes</span></a></li>
                            <li><a href="tutoPsicologa.php"><i class="fa fa-link"></i> <span>Ayuda</span></a></li>
                        </ul>
                ';
            }
        ?>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>