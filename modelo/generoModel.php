<?php 

class genero {
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

    public function getGenero() {
        $this->sql = "SELECT * FROM genero ORDER BY id DESC";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["descripcion"] =  $row["Descripcion"];
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getFilterMesa($data){
        $this->sql = "SELECT mesa.id, mesa.nombre, mesa.capacidad, puesto.detalle, mesa.estado, mesa.idpabellon as pabellon
                        FROM mesa INNER JOIN pabellon ON pabellon.id = mesa.idpabellon
                        WHERE mesa.nombre LIKE '%" . $data["nombre"] . "%' 
                        AND mesa.capacidad >= '%" . $data["cantidadi"] . "%' 
                        AND mesa.capacidad <= '%" . $data["cantidade"] . "%' 
                        AND mesa.detalle LIKE '%" . $data["detalle"] . "%' 
                        AND mesa.estado LIKE '%" . $data["estado"] . "%' 
                        ORDER BY id DESC";
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
                $temp["pabellon"] =  $row["pabellon"]; 
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function updateMesa($data){
        $this->sql = "UPDATE mesa 
                        SET nombre = '" . $data["nombre"] ."' ,
                            capacidad = " . $data["capacidad"] . " ,
                            detalle = '" . $data["detalle"] . "' ,  
                            estado = '" . $data["estado"] . "' ,  
                            idpabellon = '" . $data["pabellon"] . "'   
                        WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "La mesa " . $data["descripcion"] . " se actualizo exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function deleteMesa($data){
        $this->sql = "DELETE FROM mesa WHERE id = " . $data["codigo"];
        if ($this->queryBD()){
            $result["mensaje"] = "La mesa " . $data["descripcion"] . " se elmino correctamente !";
        } else {
            $result["mensaje"] = "Hubo un error al modificar";
        }
        return $result;
    }

    public function insertMesa($data){
        $this->sql = "INSERT INTO mesa (nombre, capacidad, detalle, estado, idpabellon) VALUES('" . $data["nombre"] . "', " . $data["capacidad"] . ", '" . $data["detalle"] .  "', " . $data["estado"] . ", " . $data["pabellon"] . " )";
        if ($this->queryBD()){
            $result["mensaje"] = "Se registro exitosamente !";
        } else {
            $result["mensaje"] = "Hubo un error al insertar la mesa";
        }
        return $result;
    }

}

?>