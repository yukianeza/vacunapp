<?php 

class paciente {
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

    public function getPaciente() {
        $this->sql = "SELECT persona.* 
                        FROM persona 
                        INNER JOIN paciente ON paciente.idpersona = persona.id
                        ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["nombre1"] =  $row["nombre1"];
                $temp["nombre2"] =  $row["nombre2"];
                $temp["dni"] =  $row["dni"];
                $temp["apellido_paterno"] =  $row["apellido_paterno"];  
                $temp["apellido_materno"] =  $row["apellido_materno"]; 
                $temp["fecha_nacimiento"] =  $row["fecha_nacimiento"];     
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getValidationPaciente($data){
        $this->sql = "SELECT paciente.* 
                        FROM paciente 
                        inner join persona on paciente.idpersona = persona.id 
                        where persona.dni = '" . $data["paciente_dni"] . "'";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["fecha_creacion"] =  $row["fecha_creacion"];
                $temp["tipo_sangre"] =  $row["tipo_sangre"];
                $temp["idpersona"] =  $row["idpersona"]; 
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function updatePaciente($data){
        $this->sql = "UPDATE persona 
                        SET nombre1 = '" . $data["nombre1"] ."', 
                            nombre2 = '" . $data["nombre2"] . "', 
                            apellido_paterno = '" . $data["apellido_paterno"] . "', 
                            apellido_materno = '" . $data["apellido_materno"] . "', 
                            dni = '" . $data["dni"] . "', 
                            fecha_nacimiento = '" . $data["fecha_nacimiento"] . "' 
                        WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El " . $data["nombre1"] . " se actualizo exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function deletePaciente($data){
        $this->sql = "DELETE FROM paciente WHERE idpersona = " . $data["codigo"];
        $this->queryBD();
        $this->sql = "DELETE FROM persona WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El registro se elmino correctamente !";
        } else {
            $result["mensaje"] = "Hubo un error al eliminar";
        }
        return $result;
    }

    public function insertPaciente($data){
        $this->sql = "INSERT INTO persona (nombre1,nombre2,apellido_paterno,apellido_materno,dni,fecha_nacimiento) 
            VALUES('" . $data["nombre1"] . 
                 "','" . $data["nombre2"] . 
                 "','" . $data["apellido_paterno"] . 
                 "','" . $data["apellido_materno"] .
                 "','" . $data["dni"] . 
                 "','" . $data["fecha_nacimiento"] . "')";
        $this->queryBD();
        $this->sql = "select persona.id from persona
                       where dni = '" . $data["dni"] . "'";
        $this->queryBD();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $idpersona =  $row["id"];
            }
        }

        $this->sql = "INSERT INTO paciente (idpersona) VALUES('" . $idpersona . "')";
        if ($this->queryBD()){
            $result["mensaje"] = "Se registro exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al insertar el pabellon";
        }
        return $result;
    }

}

?>