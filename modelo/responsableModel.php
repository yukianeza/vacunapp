<?php 

class responsable {
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

    public function getValidationResponsable($data){
        $this->sql = "SELECT responsable.* 
                        FROM responsable 
                        inner join persona on responsable.idpersona = persona.id 
                        where persona.dni = '" . $data["responsable_dni"] . "'";
        $this->queryBD();
        $data = array();
        $temp = array();
        if ($this->result->num_rows > 0) {
            
            while($row = $this->result->fetch_assoc()) {
                $temp["id"] =  $row["id"];
                $temp["fecha_creacion"] =  $row["fecha_creacion"];
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

    public function insertCita($data){
        /*
        Proceso de insercion con validacion en paciente y responsable
        
        Comenzamos con la validacion de Paciente
        1. Validar si existe en tabla persona
            1.1. No existe
                1.1.1. insertar tabla persona
                1.1.2. seleccionar su idpersona
            1.2. Existe
                1.2.1. Seleccionar su idpersona
        2. Validar si existe en tabla paciente
            2.1. No existe
                2.1.1. insertar tabla paciente
                2.1.2. seleccionar su idpaciente
            2.2. Existe
                2.2.1. seleccionar su idpaciente
        
        Comenzamos con la validacion de Responsable
        1. Validar si existe en tabla persona
            1.1. No existe
                1.1.1. insertar tabla persona
                1.1.2. seleccionar su idpersona
            1.2. Existe
                1.2.1. Seleccionar su idpersona
        2. Validar si existe en tabla Responsable
            2.1. No existe
                2.1.1. insertar tabla Responsable
                2.1.2. seleccionar su idResponsable
            2.2. Existe
                2.2.1. seleccionar su idResponsable

        Insertar en cita con estado creado

        

        */

        //Validacion de Responsable
        //1. Validar si existe en tabla persona
        $this->sql = "select * from persona where dni = " . $data["responsable_dni"];
        $this->queryBD();
        $id = 0;
        //1.1. No existe
        if ($this->result->num_rows <= 0) {
            
            //1.1.1. insertar tabla persona
            $this->sql = "insert into persona(nombre1, nombre2, apellido_paterno, apellido_materno, genero, fecha_nacimiento, dni, telefono, celular) values ('" . 
            $data["responsable_nombre1"] . "','" . 
            $data["responsable_nombre2"] . "','" . 
            $data["responsable_apellido_paterno"] . "','" .
            $data["responsable_apellido_materno"] . "'," .
            $data["responsable_genero"] . ",'" .
            $data["responsable_fecha_nacimiento"] . "','" .
            $data["responsable_dni"] . "','" .
            $data["responsable_celular"] . "','" .
            $data["responsable_telefono"]  . "')";
            $this->queryBD();
            
            //1.1.2. seleccionar su idpersona
            $this->sql = "select id from persona where dni = " . $data["responsable_dni"];
            $this->queryBD();
            while($row = $this->result->fetch_assoc()) {
                $idpersona =  $row["id"]; 
            }

        } 
        //1.2. Existe
        else {

            while($row = $this->result->fetch_assoc()) {
                $idpersona =  $row["id"]; 
            }

        }

        //2. Validar si existe en tabla Responsable
        $this->sql = "select id from responsable where idpersona = " . $idpersona;
        $this->queryBD();
        //2.1. No existe
        if ($this->result->num_rows <= 0){
            //2.1.1. insertar tabla Responsable
            $this->sql = "insert into responsable(idpersona) values (" . $idpersona . ")";
            $this->queryBD();
            //2.1.2. seleccionar su idResponsable
            $this->sql = "select id from responsable where idpersona = " . $idpersona;
            $this->queryBD();
            while($row = $this->result->fetch_assoc()) {
                $idresponsable =  $row["id"]; 
            }
        }
        //2.2. Existe
        else {
            //2.2.1. seleccionar su idResponsable
            while($row = $this->result->fetch_assoc()) {
                $idresponsable =  $row["id"]; 
            }
        }


        //Validacion de paciente
        //1. Validar si existe en tabla persona
        $this->sql = "select * from persona where dni = " . $data["paciente_dni"];
        $this->queryBD();
        $id = 0;
        //1.1. No existe
        if ($this->result->num_rows <= 0) {
            
            //1.1.1. insertar tabla persona
            $this->sql = "insert into persona(nombre1, nombre2, apellido_paterno, apellido_materno, genero, fecha_nacimiento, dni) values ('" . 
            $data["paciente_nombre1"] . "','" . 
            $data["paciente_nombre2"] . "','" . 
            $data["paciente_apellido_paterno"] . "','" .
            $data["paciente_apellido_materno"] . "'," .
            $data["paciente_genero"] . ",'" .
            $data["paciente_fecha_nacimiento"] . "','" .
            $data["paciente_dni"] . "')";
            $this->queryBD();
            
            //1.1.2. seleccionar su idpersona
            $this->sql = "select id from persona where dni = " . $data["paciente_dni"];
            $this->queryBD();
            while($row = $this->result->fetch_assoc()) {
                $idpersona =  $row["id"]; 
            }

        } 
        //1.2. Existe
        else {

            while($row = $this->result->fetch_assoc()) {
                $idpersona =  $row["id"]; 
            }

        }

        //2. Validar si existe en tabla paciente
        $this->sql = "select id from paciente where idpersona = " . $idpersona;
        $this->queryBD();
        //2.1. No existe
        if ($this->result->num_rows <= 0){
            //2.1.1. insertar tabla paciente
            $this->sql = "insert into paciente(idpersona) values (" . $idpersona . ")";
            $this->queryBD();
            //2.1.2. seleccionar su idpaciente
            $this->sql = "select id from paciente where idpersona = " . $idpersona;
            $this->queryBD();
            while($row = $this->result->fetch_assoc()) {
                $idpaciente =  $row["id"]; 
            }
        }
        //2.2. Existe
        else {
            //2.2.1. seleccionar su idpaciente
            while($row = $this->result->fetch_assoc()) {
                $idpaciente =  $row["id"]; 
            }
        }


        //Registrar cita
        $this->sql = "insert into cita(
                        idpaciente,
                        idresponsablereserva,
                        idresponsable,
                        fecha_programada,
                        idtrabajador,
                        idmesa,
                        estado) values (" .
                        $idpaciente . "," .
                        $idresponsable . "," .
                        $idresponsable . "," .
                        $data["cita_fecha"] . "," .
                        $data["trabajador_usuario"] . "," .
                        $data["cita_mesa"] . "," .
                        "1)";
        $this->queryBD();
        //Obtener id 
        $this->sql = "select id from cita order by id desc limit 1";
        $this->queryBD();
        while($row = $this->result->fetch_assoc()) {
            $idcita =  $row["id"]; 
        }
        //Leer la lista de vacuna
        //ejemplo vacuna_a  y vacuna_b
        foreach ($data["cita_vacuna_aplicacion"] as &$vacuna) {
            $this->sql = "insert into vacuna_aplicacion_cita(
                vacuna_aplicacion_id,
                cita_id) values (" . $vacuna . "," . $idcita . ")";
            $this->queryBD();  
        }
        $result["mensaje"] = "Se registro exitosamente !";
    }

}

?>