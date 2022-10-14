<?php 

class turno {
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

    public function getTurno() {
        $this->sql = "SELECT id, Turno
                        FROM turno ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["descripcion"] =  $row["Turno"];  
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getFilterTurno($data){
        $this->sql = "SELECT id, Turno 
                        FROM turno 
                        WHERE Turno LIKE '%" . $data["Turno"] . "%' 
                        ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["descripcion"] =  $row["Turno"];  
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