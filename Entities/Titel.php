<?php
namespace Entities;
use Entities\Video;

class Titel {

 private static $idMap = array();  //bevat alle reeds aangemaakte objecten van klasse Voornaam; static: slechts 1 lijst voor alle Voornaam-objecten   
 private $id;
 private $titel;
 
 
 public function __construct($id, $titel, $aanwezig) {
 $this->id = $id;
 $this->titel = $titel;
 

 
}

 public static function create($id, $titel){
     if (!isset(self::$idMap[$id])) {  //geindexeerd met id van Boek-object: snel controleren of Boek-object met bepaalde id werd aangemaakt zonder hele array te overlopen
   self::$idMap[$id] = new Video($id, $titel);  //indien er nog geen Boek-object met dit id bestaat, dan nieuw Boek-object aanmaken via constructor en aan lijst toevoegen
  } 
  return self::$idMap[$id];  //indien er wel Boek-object met dit id bestaat, dan wordt het bestaande object teruggegeven
 }
 
 public function getId() {
  return $this->id;
 }
 
 public function getTitel() {
  return $this->titel;
 }
 
 
 

 public function setTitel($titel) {
  $this->titel = $titel;
 }
 
 

 
}