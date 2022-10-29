<?php 

class ApiAplicacion {
    private $bd = array();
    private $conn;
    private $sql;
    public function __construct($bd) 
    {
        $this->bd = $bd;
        $this->connectBD();
    }

    public function connectBD(){
        $this->conn = new mysqli($this->bd["servername"], $this->bd["username"], $this->bd["password"], $this->bd["dbname"]);
        if ( $this->conn->connect_error ){
            die("Conexion fallida: " . $this->conn->connect_error);
        }
    }

    public function queryBD(){
        $this->result = $this->conn->query($this->sql);
        if ( $this->result === TRUE) {
         return true;
        } else {
            return false;
        }
    }

    public function disconnectBD(){
        $this->conn->close();     
    } 

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    public function Validacion($data) {
        $this->sql = "SELECT paciente.* 
                    FROM paciente 
                    INNER JOIN persona ON persona.id = paciente.idpersona 
                    WHERE persona.dni = '" . $data['dni'] . "' AND paciente.password = '" . $data['password'] . "'";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"]; 
                $temp["fecha_creacion"] =  $row["fecha_creacion"];  
                $temp["idpersona"] =  $row["idpersona"];  
                $temp["password"] =  $row["password"];  
                $temp["status"] =  "1";  
                array_push($data, $temp);   
            }
        }
        else{
            $temp["id"] =  ""; 
            $temp["fecha_creacion"] =  "";  
            $temp["idpersona"] =  "";  
            $temp["password"] =  "";  
            $temp["status"] =  "0";  
            array_push($data, $temp);
        }
        
        return array_reverse($data);
    }

    public function getPaciente($data){
        $this->sql = "SELECT persona.* 
            from paciente 
            inner join persona on persona.id = paciente.idpersona 
            where paciente.id = " . $data["paciente_id"];
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["nombre1"] =  $row["nombre1"]; 
                $temp["nombre2"] =  $row["nombre2"]; 
                $temp["nombre3"] =  $row["nombre3"]; 
                $temp["apellido_paterno"] =  $row["apellido_paterno"]; 
                $temp["apellido_materno"] =  $row["apellido_materno"]; 
                $temp["genero"] =  $row["genero"]; 
                $temp["dni"] =  $row["dni"];  
                $temp["telefono"] =  $row["telefono"];  
                $temp["fecha_nacimiento"] =  $row["fecha_nacimiento"];  
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getCita($data){
        $this->sql = "SELECT cita.* from paciente 
        inner join persona on persona.id = paciente.idpersona 
        inner join cita on cita.idpaciente = paciente.id 
        where paciente.id = " . $data["paciente_id"];
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["idpaciente"] =  $row["idpaciente"]; 
                $temp["idresponsable"] =  $row["idresponsable"]; 
                $temp["fecha_creacion"] =  $row["fecha_creacion"]; 
                $temp["fecha_programada"] =  $row["fecha_programada"]; 
                $temp["idtrabajador"] =  $row["idtrabajador"]; 
                $temp["idmesa"] =  $row["idmesa"]; 
                $temp["estado"] =  $row["estado"];
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getVacuna($data){
        $this->sql = "SELECT vacuna.nombre, aplicacion.detalle, cita.fecha_programada 
        FROM vacuna_aplicacion_cita
        INNER JOIN cita ON cita.id = vacuna_aplicacion_cita.cita_id
        INNER JOIN vacuna_aplicacion ON vacuna_aplicacion.id = vacuna_aplicacion_cita.vacuna_aplicacion_id
        INNER JOIN vacuna ON vacuna.id = vacuna_aplicacion.vacuna_id
        INNER JOIN aplicacion ON aplicacion.id = vacuna_aplicacion.aplicacion_id
        WHERE cita.idpaciente = " . $data["paciente_id"];
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["nombre"] =  $row["nombre"];
                $temp["detalle"] =  $row["detalle"]; 
                $temp["fecha_programada"] =  $row["fecha_programada"]; 
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function updateTurno($data){
        $this->sql = "UPDATE turno 
                        SET Turno = '" . $data["Turno"] ."' 
                        WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El " . $data["Turno"] . " se actualizo exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function deleteTurno($data){
        $this->sql = "DELETE FROM turno WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El " . $data["Turno"] . " se elmino correctamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function insertTurno($data){
        $this->sql = "INSERT INTO turno (Turno) VALUES('" . $data["Turno"] . "'" . ")";
        if ($this->queryBD()){
            $result["mensaje"] = "Se registro exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al insertar el pabellon";
        }
        return $result;
    }

}

?>