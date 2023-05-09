<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    # MODIFICATION 09/05/2023
    if(!function_exists('queryCout')){
        function queryCout($compte, $produit, $nature, $centre){ //izay debit > credit
            $ci=& get_instance();
            $query="select sum(cout::numeric) as somme from coutProduits";
            if($nature==-1&&$centre==-1){
                if(strcmp($compte,'0')!=0||$produit!=-1){
                    if(strcmp($compte,'0')!=0&&$produit==-1){
                        $query.=" where numero='%s'";
                        $query=sprintf($query,$compte);
                    }
                    else if($produit!=-1&&strcmp($compte,'0')==0){
                        $query.=" where idProduit='%s'";
                        $query=sprintf($query,$produit);
                    }
                    else{
                        $query.=" where numero='%s' and idProduit=%s";
                        $query=sprintf($query,$compte,$produit);
                    }
                }
                return $query;
            }else{
                $query="select sum(cout_centre::numeric) as somme from coutProduitsCentres";
                $withProd=false;
                if($produit!=-1||strcmp($compte,'0')!='0'){
                    $query.=" as cpc join coutproduits as cp on cpc.idcoutproduits=cp.id";
                    if(strcmp($compte,'0')!=0&&$produit==-1){
                        $query.=" where cp.numero='%s'";
                        $query=sprintf($query,$compte);
                    }
                    else if($produit!=-1&&strcmp($compte,'0')==0){
                        $query.=" where cp.idProduit='%s'";
                        $query=sprintf($query,$produit);
                    }
                    else{
                        $query.=" where numero='%s' and idProduit=%s";
                        $query=sprintf($query,$compte,$produit);
                    }
                    $withProd=true;
                }
                if($withProd){
                    $query.=" and";
                }else{
                    $query.=" where";
                }
                if($nature==-1&&$centre!=-1){
                    $query.=" idCentre=%s";
                    $query=sprintf($query,$centre);
                }else if($nature!=-1&&$centre==-1){
                    $query.=" estVariable='%s'";
                    $query=sprintf($query,$nature);
                }else{
                    $query.=" idCentre=%s and estVariable='%s'";
                    $query=sprintf($query,$centre,$nature);
                }
                return $query;
            }
        }
    }

    if(!function_exists('totalGrpActif')){
        function totalGrpActif($tabGrp, $data){ //izay debit > credit
            $ci=& get_instance();
            $ci->load->helper("harena");
            $total = 0;
            foreach ($tabGrp as $key => $entite) {
                $g = $data['g'.$entite];
                $solde = $g->solde;
                if($g->solde < 0) $solde = 0; //ra debit < credit de 0
                $total += $solde; 	
            }
            return $total;
        }
    }

    if(!function_exists('totalGrpPassif')){
        function totalGrpPassif($tabGrp, $data){ //izay debit < credit
            $ci=& get_instance();
            $ci->load->helper("harena");
            $total = 0;
            foreach ($tabGrp as $key => $entite) {
                $g = $data['g'.$entite];
                $solde = $g->solde;
                if($g->solde > 0) $solde = 0; //ra debit > credit de 0
                $total += $solde; 	
            }
            return abs($total);
        }
    }

    if(!function_exists('constrGrp')){
        function constrGrp($tabGrp, $data, $debut, $fin, $exclus = array()){
            $ci=& get_instance();
            $ci->load->helper("harena");
            foreach ($tabGrp as $key => $entite) { 
                    
                $g = $ci->Admin->getGroupeCompte($entite, $debut, $fin);
                if(count($exclus) > 0) {
                    if($entite == $exclus["prefixe"]) {
                        $g = $ci->Admin->getGroupeCompte($entite, $debut, $fin, $exclus); 
                    }
                } 

                if(!isset($g[0])) {
                    $g[0] = array(
                        'groupe' => $entite,
                        'debit' => 0,
                        'credit' => 0,
                        'solde' => 0
                    );
                    $g[0] = $ci->Admin->array_to_object($g[0]);
                }
                else {
                    $g[0]->solde = getSolde($g[0]);
                }
                
                $data['g'.$entite] = $g[0]; 	 	
            } 	
            return $data;
        }
    }

    if(!function_exists('getSoldes')){
        function getSoldes($ecritures){
            $soldes=array();
            foreach($ecritures as $e){
                $soldes[]=verifierSolde($e);
            }
            return $soldes;
        }
    }
    if(!function_exists('verifierSolde')){
        function verifierSolde($ecriture){
            $soldeBalance=array();
            if($ecriture['solde']<0){
                $soldeBalance['debit']=0;
                $soldeBalance['credit']=$ecriture['solde']*-1;
            }else{
                $soldeBalance['debit']=$ecriture['solde'];
                $soldeBalance['credit']=0;
            }
            return $soldeBalance;
        }
    }
?>