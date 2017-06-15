<?php
namespace Entities;
use Entities\Video;

class Video {

 private static $idMap = array();  //bevat alle reeds aangemaakte objecten van klasse Voornaam; static: slechts 1 lijst voor alle Voornaam-objecten   
 private $id;
 private $videonr;
 private $titelnr;
 private $aanwezig;
 
 public function __construct($id, $titelnr, $aanwezig) {
 $this->id = $id;
 $this->videonr = $videonr;
 $this->titelnr = $titelnr;
 $this->aanwezig = $aanwezig;

 
}

 public static function create($id, $videonr, $titelnr, $aanwezig){
     if (!isset(self::$idMap[$id])) {  //geindexeerd met id van Boek-object: snel controleren of Boek-object met bepaalde id werd aangemaakt zonder hele array te overlopen
   self::$idMap[$id] = new Video($id, $videonr, $titelnr, $aanwezig);  //indien er nog geen Boek-object met dit id bestaat, dan nieuw Boek-object aanmaken via constructor en aan lijst toevoegen
  } 
  return self::$idMap[$id];  //indien er wel Boek-object met dit id bestaat, dan wordt het bestaande object teruggegeven
 }
 
 public function getId() {
  return $this->id;
 }
 public function getVideonr() {
  return $this->videonr;
 }
 
 public function getTitelnr() {
  return $this->titel;
 }
 
 public function getAanwezig(){
     return $this->aanwezig;
 }
 public function setVideonr($videonr) {
  $this->videonr = $videonr;
 }

 public function setTitelnr($titelnr) {
  $this->titelnr = $titelnr;
 }
 
 public function setAanwezig($aanwezig){
     $this->aanwezig=$aanwezig;
}

 
}