<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    if(!function_exists("countLength")){
        function countLength($numero){
            return strlen($numero);
        }
    }
    if(!function_exists("checkLength")){
        function checkLength($numero){
            if($numero[0] == "4") {
                if(strlen($numero) > 13) return 0;
            }
            else {
                if(strlen($numero) > 5) return 0;
            }
            return 1;
        }
    }
    if(!function_exists("fillWithZero")){
        function fillWithZero($numero){
            $zeros = "";

            for ($i=0; $i < 5 - strlen($numero); $i++) { 
                $zeros = $zeros."0";
            }
            return $numero.$zeros;
            
        }
    }

?>