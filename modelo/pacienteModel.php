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

    public function getPabellon() {
        $this->sql = "SELECT id, nombre, capacidad, detalle, estado 
                        FROM pabellon ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["nombre"] =  $row["nombre"];
                $temp["capacidad"] =  $row["capacidad"];
                $temp["detalle"] =  $row["detalle"];  
                $temp["estado"] =  $row["estado"];     
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

    public function updatePabellon($data){
        $this->sql = "UPDATE pabellon 
                        SET nombre = '" . $data["nombre"] ."',
                            capacidad = " . $data["capacidad"] . ",
                            detalle = '" . $data["detalle"] . "',
                            estado = " . $data["estado"] . " 
                        WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El " . $data["nombre"] . " se actualizo exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function deletePabellon($data){
        $this->sql = "DELETE FROM pabellon WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El " . $data["nombre"] . " se elmino correctamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function insertResponsable($data){
        $this->sql = "INSERT INTO pabellon (nombre,capacidad,detalle,estado) VALUES('" . $data["nombre"] . "'," . $data["capacidad"] . ",'" . $data["detalle"] . "'," . $data["estado"] . ")";
        if ($this->queryBD()){
            $result["mensaje"] = "Se registro exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al insertar el pabellon";
        }
        return $result;
    }

}

?>