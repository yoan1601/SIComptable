<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    if(!function_exists('getSolde')){
        function getSolde($groupe){
            //$rep = abs($groupe->debit - $groupe->credit);
            $rep = $groupe->debit - $groupe->credit;
            return $rep;
        }
    }

    if(!function_exists('sommeDebitCredit')){
        function sommeDebitCredit($soldes){
            $debitCredit = array();
            $totalDebit = 0;
            $totalCredit = 0;
            foreach ($soldes as $key => $solde) {
                $totalDebit = $totalDebit + $solde['debit'];
                $totalCredit = $totalCredit + $solde['credit'];
            }
            $debitCredit [] = $totalDebit;
            $debitCredit [] = $totalCredit;
            return $debitCredit;
        }
    }

    if(!function_exists('strToFloat')){
        function strToFloat($chaine){
            //$chaine = " 455 560,00 ";
            $chaine = str_replace(' ', '', $chaine); // enlève les espaces
            $chaine = str_replace(',', '.', $chaine); // remplace la virgule par le point
            $nombre = filter_var($chaine, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            //$nombre = floatval($chaine);
            /*echo $chaine.' -> '.$nombre;
            echo '</br>';*/
            return $nombre; 
        }
    }

    if(!function_exists('verifAllDate')){
        function verifAllDate($dates, $dateDebutExercice){
            foreach ($dates as $index => $date) {
                if(verifDate($date, $dateDebutExercice) == 0) {
                    return 0;
                }
            }
            return 1;
        }
    }

    defined('BASEPATH') OR exit('No direct script access allowed');
    if(!function_exists('verifDate')){
        function verifDate($date, $dateDebutExercice){
            $DTdate = new DateTime($date);
            $DTDebutExercice = new DateTime($dateDebutExercice);
            $DTFinExercice = (new DateTime($dateDebutExercice))->add(new DateInterval('P1Y'));
            /*echo $DTdate->format('Y-m-d');
            echo '</br> date debut';
            echo $DTDebutExercice->format('Y-m-d');
            echo '</br> date fin';
            echo $DTFinExercice->format('Y-m-d');
            echo '</br>';
            echo '================================';*/
            if($DTdate >= $DTDebutExercice && $DTdate <= $DTFinExercice) {
                return 1;
            }
            return 0;
        }
    }
?>
