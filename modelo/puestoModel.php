<?php 

class puesto {
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

    public function getPuesto() {
        $this->sql = "SELECT puesto.id, idarea, area.descripcion AS area, puesto.descripcion
                        FROM puesto INNER JOIN area ON area.id = idarea ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["idarea"] =  $row["idarea"];
                $temp["area"] =  $row["area"];
                $temp["descripcion"] =  $row["descripcion"]; 
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getFilterPuesto($data){
        $this->sql = "SELECT puesto.id, idarea, area.descripcion AS area, puesto.descripcion
                        FROM puesto INNER JOIN area ON area.id = idarea
                        WHERE puesto.descripcion LIKE '%" . $data["descripcion"] . "%' 
                        AND idarea LIKE '%" . $data["area"] . "%' 
                        ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["idarea"] =  $row["idarea"];
                $temp["area"] =  $row["area"];
                $temp["descripcion"] =  $row["descripcion"]; 
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function updatePuesto($data){
        $this->sql = "UPDATE puesto 
                        SET descripcion = '" . $data["descripcion"] ."' ,
                            idarea = " . $data["area"] . " 
                        WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El puesto " . $data["descripcion"] . " se actualizo exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function deletePuesto($data){
        $this->sql = "DELETE FROM puesto WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "El puesto " . $data["descripcion"] . " se elmino correctamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function insertPuesto($data){
        $this->sql = "INSERT INTO puesto (idarea, descripcion) VALUES(" . $data["area"] . ", '" . $data["descripcion"] . "')";
        if ($this->queryBD()){
            $result["mensaje"] = "Se registro exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al insertar el pabellon";
        }
        return $result;
    }

}

?>