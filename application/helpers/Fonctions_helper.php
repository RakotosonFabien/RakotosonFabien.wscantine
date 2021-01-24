<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function allMonths(){
    return ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];
}
function allDaysCount($annee){
    $all = [31,28,31,30,31,30,31,31,30,31,30,31]; 
    if($annee%4==0){
        $all[1] = 29;
    }
    return $all;
}
function testDate($jour1, $mois, $annee){
    if(filter_var($jour1, FILTER_VALIDATE_INT) === false || filter_var($mois, FILTER_VALIDATE_INT) === false || filter_var($annee, FILTER_VALIDATE_INT) === false){
        return false;
    }
    if($mois>12 || $mois<1){
        return false;
    }
    $jourTotal = allDaysCount($annee)[$mois-1];
    if($jour1<1 || $jour1>$jourTotal){
        return false;
    }
    return true;
}

function encryptString($string, $db){
    $requete = "SELECT sha1('%s') as string";
    $requete = sprintf($requete, $string);
    $query = $db->query($requete);
    $resultat = null;
    foreach($query->result_array() as $row){
        $resultat = $row['string'];
        break;
    }
    $query->free_result();
    return $resultat;
}
