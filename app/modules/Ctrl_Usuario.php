<?php
    include_once 'requires.php';

    $action=$_POST['action'];

    switch ($action)
    {
        case "login":
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $result=login($email,$pass);
            echo $result;
            break;
        case "registerEstudiante":
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $ci=$_POST['ci'];
            $curso=$_POST['curso'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $sexo=$_POST['sexo'];
            $result=registerEstudiante($nombres,$apellidos,$ci,$curso,$telefono,$email,$pass,$sexo);
            echo $result;
            break;
        case "editUser":
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $ci=$_POST['ci'];
            $curso=$_POST['curso'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $sexo=$_POST['sexo'];
            $tipo=$_POST['tipo'];
            $id=$_POST['id'];
            $result=editUser($nombres,$apellidos,$ci,$curso,$telefono,$email,$pass,$sexo,$tipo,$id);
            echo $result;
            break;
    }

    function login($email,$pass)
    {
        $login_usuario=Usuarios::query()->where('email','=',$email)->where('password','=',$pass)->get();
        if($login_usuario[0]==null)
        {
            return "no";
        }
        else
        {
            //Inicio de variables de sesi�n
            if (!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['id'] = $login_usuario[0]["id"];
            $_SESSION['email'] = $login_usuario[0]["email"];
            $_SESSION['tipo'] = $login_usuario[0]["tipo"];
            return "ok";
        }
    }

    function registerEstudiante($nombres, $apellidos, $ci, $curso, $telefono, $email, $pass, $sexo)
    {
        $val_est=Estudiantes::query()->where('ci','=',$ci)->get();
        $val_usu=Usuarios::query()->where('email','=',$email)->get();
        if($val_est[0]==null && $val_usu[0]==null)
        {
            $register_estudiante=Estudiantes::create([
                'ci'=>$ci,
                'nombres'=>$nombres,
                'apellidos'=>$apellidos,
                'curso'=>$curso,
                'telefono'=>$telefono,
                'email'=>$email,
                'password'=>$pass,
                'sexo'=>$sexo
            ]);

            $register_estudiante=Usuarios::create([
                'email'=>$email,
                'password'=>$pass,
                'fecha_creacion'=>date('Y-m-d H:i:s'),
                'tipo'=>1
            ]);

            return "ok";
        }
        return "no";
    }

    function editUser($nombres, $apellidos, $ci, $curso, $telefono, $email, $pass, $sexo, $tipo, $id)
    {
        if($tipo=="0")
        {
            $email_usu=Usuarios::query()->where('id','=',$id)->get();
            $past_email=$email_usu[0]["email"];
            $val_usu=Usuarios::query()->where('id','=',$id)->update([
                'email'=>$email,
                'password'=>$pass
            ]);
            $_SESSION['email'] = $email;

            $val_psi=Psicologia::query()->where('email','=',$past_email)->update([
                'nombres'=>$nombres,
                'apellidos'=>$apellidos,
                'telefono'=>$telefono,
                'email'=>$email,
                'password'=>$pass,
            ]);

            $val_psi_ver=Psicologia::query()
                ->where('nombres','=',$nombres)
                ->where('apellidos','=',$apellidos)
                ->where('telefono','=',$telefono)
                ->where('email','=',$email)
                ->where('password','=',$pass)
                ->get();

            if($val_psi_ver[0]==null)
            {
                return "no";
            }
            else
            {
                return "ok";
            }
        }
        elseif ($tipo=="1")
        {
            $email_usu=Usuarios::query()->where('id','=',$id)->get();
            $past_email=$email_usu[0]["email"];
            $val_usu=Usuarios::query()->where('id','=',$id)->update([
                'email'=>$email,
                'password'=>$pass
            ]);

            $val_est=Estudiantes::query()->where('email','=',$past_email)->update([
                'nombres'=>$nombres,
                'apellidos'=>$apellidos,
                'ci'=>$ci,
                'curso'=>$curso,
                'telefono'=>$telefono,
                'email'=>$email,
                'password'=>$pass,
                'sexo'=>$sexo
            ]);

            $val_est_ver=Estudiantes::query()->where('ci','=',$ci)
                                            ->where('nombres','=',$nombres)
                                            ->where('apellidos','=',$apellidos)
                                            ->where('curso','=',$curso)
                                            ->where('telefono','=',$telefono)
                                            ->where('email','=',$email)
                                            ->where('password','=',$pass)
                                            ->where('sexo','=',$sexo)
                                            ->get();

                if($val_est_ver[0]==null)
                {
                    return "no";
                }
                else
                {
                    return "ok";
                }
        }
    }
?>