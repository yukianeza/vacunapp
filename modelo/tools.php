<?php

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getSetBool($value){
      return $value ? 1 : 0; 
    }

    function posCenter($cad, $tam){
      
      $cadLenght = strlen($cad);
      if ($tam >= $cadLenght){
        $len = ($tam - $cadLenght) / 2;

        $esp = "";
        $i = 0;
        while($i < $len){
          $esp =  $esp . " ";
          $i = $i + 1;
        }
        $newCad = $esp . $cad  ;      
      }
      else{
        $newCad =  substr($cad, 0, $tam); 
      }

      return $newCad;
    }

    function posLeft($cad, $tam){
      $cadLenght = strlen($cad);
      if ($tam >= $cadLenght){
        $len = ($tam - $cadLenght);

        $esp = "";
        $i = 0;
        while($i < $len){
          $esp =  $esp . " ";
          $i = $i + 1;
        }
        $newCad =  $cad . $esp  ;      
      }
      else{
        $newCad =  substr($cad, 0, $tam); 
      }
      return $newCad;  
    }

    function posRight($cad, $tam){
      $cadLenght = strlen($cad);
      if ($tam >= $cadLenght){
        $len = ($tam - $cadLenght);

        $esp = "";
        $i = 0;
        while($i < $len){
          $esp =  $esp . " ";
          $i = $i + 1;
        }
        $newCad = $esp . $cad  ;      
      }
      else{
        $newCad =  substr($cad, 0, $tam); 
      }

      return $newCad;
    }



    function setLine($tam){
      $esp = "";
      $i = 0;
      while($i < $tam){
        $esp =  $esp . "-";
        $i = $i + 1;
      }
      return $esp;
    }

?>