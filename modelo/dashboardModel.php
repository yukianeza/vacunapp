<?php 

class dashboard {
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

    public function getDashboard() {
        $this->sql = "
        SELECT 'Enero' as MES, count(*) as CANTIDAD FROM cita where fecha_programada >= '2022-01-01' and fecha_programada <= '2022-01-31' UNION
        SELECT 'Febrero', count(*) FROM cita where fecha_programada >= '2022-02-01' and fecha_programada <= '2022-02-28' UNION
        SELECT 'Marzo', count(*) FROM cita where fecha_programada >= '2022-03-01' and fecha_programada <= '2022-03-31' UNION
        SELECT 'Abril', count(*) FROM cita where fecha_programada >= '2022-04-01' and fecha_programada <= '2022-04-30' UNION
        SELECT 'Mayo', count(*) FROM cita where fecha_programada >= '2022-05-01' and fecha_programada <= '2022-05-31' UNION
        SELECT 'Junio', count(*) FROM cita where fecha_programada >= '2022-06-01' and fecha_programada <= '2022-06-30' UNION
        SELECT 'Julio', count(*) FROM cita where fecha_programada >= '2022-07-01' and fecha_programada <= '2022-07-31' UNION
        SELECT 'Agosto', count(*) FROM cita where fecha_programada >= '2022-08-01' and fecha_programada <= '2022-08-31' UNION
        SELECT 'Setiembre', count(*) FROM cita where fecha_programada >= '2022-09-01' and fecha_programada <= '2022-09-30' UNION
        SELECT 'Octubre', count(*) FROM cita where fecha_programada >= '2022-10-01' and fecha_programada <= '2022-10-31' UNION
        SELECT 'Noviembre', count(*) FROM cita where fecha_programada >= '2022-11-01' and fecha_programada <= '2022-11-30' UNION
        SELECT 'Diciembre', count(*) FROM cita where fecha_programada >= '2022-12-01' and fecha_programada <= '2022-12-31'
        ";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["mes"] =  $row["MES"];
                $temp["cantidad"] =  $row["CANTIDAD"];
                array_push($data, $temp);   
            }
        }
        
        return array_reverse($data);
    }

    public function getDashboard2() {
        $this->sql = "
        SELECT 'Enero' as MES, count(*) as CANTIDAD FROM cita where fecha_programada >= '2022-01-01' and fecha_programada <= '2022-01-31' UNION
        SELECT 'Febrero', count(*) FROM cita where fecha_programada >= '2022-02-01' and fecha_programada <= '2022-02-28' UNION
        SELECT 'Marzo', count(*) FROM cita where fecha_programada >= '2022-03-01' and fecha_programada <= '2022-03-31' UNION
        SELECT 'Abril', count(*) FROM cita where fecha_programada >= '2022-04-01' and fecha_programada <= '2022-04-30' UNION
        SELECT 'Mayo', count(*) FROM cita where fecha_programada >= '2022-05-01' and fecha_programada <= '2022-05-31' UNION
        SELECT 'Junio', count(*) FROM cita where fecha_programada >= '2022-06-01' and fecha_programada <= '2022-06-30' UNION
        SELECT 'Julio', count(*) FROM cita where fecha_programada >= '2022-07-01' and fecha_programada <= '2022-07-31' UNION
        SELECT 'Agosto', count(*) FROM cita where fecha_programada >= '2022-08-01' and fecha_programada <= '2022-08-31' UNION
        SELECT 'Setiembre', count(*) FROM cita where fecha_programada >= '2022-09-01' and fecha_programada <= '2022-09-30' UNION
        SELECT 'Octubre', count(*) FROM cita where fecha_programada >= '2022-10-01' and fecha_programada <= '2022-10-31' UNION
        SELECT 'Noviembre', count(*) FROM cita where fecha_programada >= '2022-11-01' and fecha_programada <= '2022-11-30' UNION
        SELECT 'Diciembre', count(*) FROM cita where fecha_programada >= '2022-12-01' and fecha_programada <= '2022-12-31'
        ";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["mes"] =  $row["MES"];
                $temp["cantidad"] =  $row["CANTIDAD"];
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