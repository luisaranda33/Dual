<?php
include 'DB.php';
/*include 'login.php';*/
class consultas extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    // nuevoProfesor.php
    public function nuevoProfesor($nombre, $ape1, $ape2, $contra, $correo)
    {
        $sql = "INSERT INTO profesor (Nombre, Apellido1, Apellido2, Contraseña, Email) VALUES ('" . $nombre . "', '" . $ape1 . "', '" . $ape2 . "', '" . $contra . "', '" . $correo . "')";
        $this->realizarConsulta($sql);
    }

    // nuevoAlumno.php sin observaciones
    public function nuevoAlumnoSin($nombre, $ape1, $ape2, $contra, $dni, $fecha, $correo, $tel, $empresa, $tutor, $ndual, $nfct)
    {
        $sql = "INSERT INTO alumno (Nombre,Apellido1,Apellido2,Contraseña,DNI,Fecha_Nacimiento,Email,Telefono,Empresa,Tutor,NºHoras_Dual,NºHoras_FCT) VALUES ('" . $nombre . "','" . $ape1 . "','" . $ape2 . "','" . $contra . "','" . $dni . "','" . $fecha . "','" . $correo . "'," . $tel . ",'" . $empresa . "','" . $tutor . "'," . $ndual . "," . $nfct . ")";
        $this->realizarConsulta($sql);
    }

    // nuevoAlumno.php con observaciones
    public function nuevoAlumnoCon($nombre, $ape1, $ape2, $contra, $dni, $fecha, $correo, $tel, $empresa, $tutor, $ndual, $nfct, $obs)
    {
        $sql = "INSERT INTO alumno (Nombre,Apellido1,Apellido2,Contraseña,DNI,Fecha_Nacimiento,Email,Telefono,Empresa,Tutor,NºHoras_Dual,NºHoras_FCT,Observaciones) VALUES ('" . $nombre . "','" . $ape1 . "','" . $ape2 . "','" . $contra . "','" . $dni . "','" . $fecha . "','" . $correo . "'," . $tel . ",'" . $empresa . "','" . $tutor . "'," . $ndual . "," . $nfct . ",'" . $obs . "')";
        $this->realizarConsulta($sql);
    }

    // nuevaEmpresa.php sin observaciones
    public function nuevaEmpresaSin($nombre, $tel, $correo, $respon)
    {
        $sql = "INSERT INTO empresa (Nombre_Empresa,Telefono,Email,Responsable) VALUES ('" . $nombre . "', " . $tel . ", '" . $correo . "', '" . $respon . "')";
        $this->realizarConsulta($sql);
    }

    // nuevaEmpresa.php con observaciones
    public function nuevaEmpresaCon($nombre, $tel, $correo, $respon, $obs)
    {
        $sql = "INSERT INTO empresa (Nombre_Empresa,Telefono,Email,Responsable,Observaciones) VALUES ('" . $nombre . "', " . $tel . ", '" . $correo . "', '" . $respon . "','" . $obs . "')";
        $this->realizarConsulta($sql);
    }

    // nuevaActividad.php sin observaciones
    public function nuevaActividadSin($fecha, $tipo, $horas, $act)
    {
        $sql = "INSERT INTO actividades (Fecha, Tipo_práctica, Total_Horas, Actividad_realizada) VALUES ('" . $fecha . "', '" . $tipo . "', " . $horas . ", '" . $act . "')";
        $this->realizarConsulta($sql);
    }

    // nuevaActividad.php con observaciones
    public function nuevaActividadCon($fecha, $tipo, $horas, $act, $obs)
    {
        $sql = "INSERT INTO actividades (Fecha, Tipo_práctica, Total_Horas, Actividad_realizada, Observaciones) VALUES ('" . $fecha . "', '" . $tipo . "', " . $horas . ", '" . $act . "','" . $obs . "')";
        $this->realizarConsulta($sql);
    }

    //mostrar_alumno.php
    public function mostraralumno()
    {
        $sql = "SELECT * FROM alumno where Tutor='" . $_SESSION['Nombre'] . "'";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }

    //mostrar profesor.php

    public function mostrarprofesor()
    {
        $sql = "SELECT * FROM profesor";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }
    //Select en añadirAlumno.php
    public function mostrarprofesor_select($profesorNombre)
    {
        $sql = "SELECT * FROM profesor WHERE Nombre !='" . $profesorNombre . "'";
        $resultado = $this->realizarConsulta($sql);
        return $resultado;
    }

    public function mostraralumno_select($alumnoNombre)
    {
        $sql = "SELECT * FROM alumno WHERE Nombre !='" . $alumnoNombre . "'";
        $resultado = $this->realizarConsulta($sql);
        return $resultado;
    }
    //mostrar empresa.php

    public function mostrarempresa()
    {
        $sql = "SELECT * FROM empresa";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }
    //select de empresa en añadirAlumno.php
    public function mostrarempresa_select()
    {
        $sql = "SELECT * FROM empresa";
        $resultado = $this->realizarConsulta($sql);
        return $resultado;
    }
    //mostrar actividad.php como admin

    public function mostraractividad()
    {
        $sql = "SELECT a.ID_Actividad, a.Fecha, a.Tipo_práctica, a.Total_Horas, a.Actividad_realizada, a.Observaciones, al.Nombre as nAlumno, al.Apellido1 as alApe1, al.Apellido2 as alApe2, p.Nombre as nProfe, p.Apellido1 as pApe1, p.Apellido2 as pApe2 from actividades as a join alumno_actividad as aa on a.ID_Actividad=aa.ID_actividad join alumno as al on aa.ID_Alumno=al.ID_Alumno join alumno_profesor as ap on al.ID_Alumno=ap.ID_Alumno join profesor as p on ap.ID_profesor=p.ID_Profesor";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }

    //mostrar actividad.php en el case de un profesor

    public function mostrarActividadProfe($idProfe)
    {
        $sql = "SELECT a.ID_Actividad, a.Fecha, a.Tipo_práctica, a.Total_Horas, a.Actividad_realizada, a.Observaciones, al.Nombre as nAlumno, al.Apellido1 as alApe1, al.Apellido2 as alApe2, p.Nombre as nProfe, p.Apellido1 as pApe1, p.Apellido2 as pApe2 from actividades as a join alumno_actividad as aa on a.ID_Actividad=aa.ID_actividad join alumno as al on aa.ID_Alumno=al.ID_Alumno join alumno_profesor as ap on al.ID_Alumno=ap.ID_Alumno join profesor as p on ap.ID_profesor=p.ID_Profesor where p.ID_Profesor=" . $idProfe;
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }

    //mostrar actividad.php en el case de un ALUMNO (consulta mejorada)

    public function mostrarActividadAlu2()
    {
$sql = "SELECT a.ID_Actividad, a.Fecha, a.Tipo_práctica, a.Total_Horas, a.Actividad_realizada, a.Observaciones, al.Nombre as nAlumno, al.Apellido1 as alApe1, al.Apellido2 as alApe2, p.Nombre as nProfe, p.Apellido1 as pApe1, p.Apellido2 as pApe2 from actividades as a join alumno_actividad as aa on a.ID_Actividad=aa.ID_actividad join alumno as al on aa.ID_Alumno=al.ID_Alumno join alumno_profesor as ap on al.ID_Alumno=ap.ID_Alumno join profesor as p on ap.ID_profesor=p.ID_Profesor";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
        /*
        $sql = "SELECT a.ID_Actividad, a.Fecha, a.Tipo_práctica, a.Total_Horas, a.Actividad_realizada, a.Observaciones, al.Nombre as nAlumno, al.Apellido1 as alApe1, al.Apellido2 as alApe2, p.Nombre as nProfe, p.Apellido1 as pApe1, p.Apellido2 as pApe2 from actividades as a join alumno_actividad as aa on a.ID_Actividad=aa.ID_actividad join alumno as al on aa.ID_Alumno=al.ID_Alumno join alumno_profesor as ap on al.ID_Alumno=ap.ID_Alumno join profesor as p on ap.ID_profesor=p.ID_Profesor where al.ID_Alumno=" . $idAlu;
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }*/
    }

    // login.php para profesores
    // public function loginProfesor($email){
    // 	$sql="SELECT * FROM profesor where Email='".$email."'";
    // 	$resultado =$this->realizarConsulta($sql);
    // 	if ($resultado!=null){
    // 		$tabla=[];
    // 		while($fila=$resultado->fetch_assoc()){
    // 			$tabla[]=$fila;
    // 		}
    // 			return $tabla;
    // 		}else{
    // 			return null;
    // 	}
    // }

    // // login.php para alumnos
    // public function loginAlumno($email){
    // 	$sql="SELECT * FROM alumno where Email='".$email."'";
    // 	$resultado =$this->realizarConsulta($sql);
    // 	if ($resultado!=null){
    // 		$tabla=[];
    // 		while($fila=$resultado->fetch_assoc()){
    // 			$tabla[]=$fila;
    // 		}
    // 			return $tabla;
    // 		}else{
    // 			return null;
    // 	}
    // }
    public function login($email)
    {
        $sql = "SELECT Email,rol,Contraseña,ID_Alumno as ID,Nombre FROM alumno WHERE email='" . $email . "' UNION ALL SELECT Email,rol,Contraseña,ID_Profesor as ID,Nombre FROM profesor WHERE email='" . $email . "'";
        $resultado = $this->realizarConsulta($sql);
        if ($resultado != null) {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tabla[] = $fila;
            }
            return $tabla;
        } else {
            return null;
        }
    }
    function actulizarAlumno($nombre, $ape1, $ape2, $contra, $dni, $fecha, $correo, $tel, $empresa, $tutor, $ndual, $nfct, $obs)
    {




        $sql = "UPDATE alumno set Nombre=" . $nombre . ", Apellido1='" . $ape1 . ",Apellido2=" . $ape2 . ",Contraseña=" . $contra . ", DNI=" . $dni . ",Fecha_Nacimiento=" . $fecha . ",Email=" . $correo . ",Telefono=" . $tel . ",Empresa=" . $empresa . ",Tutor=" . $tutor . ",NºHoras_Dual=" . $ndual . ",NºHoras_FCT=" . $nfct . ",Observaciones=" . $obs . ")";
        $this->realizarConsulta($sql);
    }
   
    
    public function alumnosActividad()
    {
        $sql = "INSERT INTO alumno_actividad(ID_Actividad,ID_Alumno)
 		VALUES ((SELECT ID_Alumno FROM Alumno),
		 (SELECT ID_Actividad FROM actividades))";
        $resultado = $this->realizarConsulta($sql);
        return $resultado;
    }
    public function ultimaActividad()
    {
        $sql = "SELECT ID_Actividad FROM actividades ORDER by DESC LIMIT 1";
        $resultado = $this->realizarConsulta($sql);
        return $resultado;
    }
    
    public function eliminarAlumno($id)
    {
        
        $sql="DELETE FROM alumno WHERE ID_Alumno=".$id;
        
         return $this->realizarConsulta($sql);

           
    }
    function mostrar_update($id)
    {
        $sql ="SELECT * FROM alumno where ID_Alumno=".$id;
        return $this->realizarConsulta($sql);
    }
    
    function eliminarProfesor($id)
    {
        
        $sql = "DELETE FROM profesor WHERE ID_Profesor=".$id;
        $this->realizarConsulta($sql);
		
    }
    function actualizarProfesor($nombre, $ape1, $ape2, $contra, $correo)
    {
        $sql = "UPDATE profesor SET Nombre=" . $nombre .", Apellido1=" . $ape1 .", Apellido2=" . $ape2 .", Contraseña=". $contra .", Email=" . $correo . ")";
        $this->realizarConsulta($sql);
    }

    function eliminarEmpresa($id)
    {
        $sql = "DELETE FROM empresa WHERE ID_Empresa=".$id;
        $this->realizarConsulta($sql);
    }
    function eliminarActividad($id)
    {
        $sql = "DELETE FROM actividades WHERE ID_Actividad=".$id;
        $this->realizarConsulta($sql);
    }

}
    