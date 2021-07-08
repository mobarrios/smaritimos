<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class Additionals extends Entity
 {

     protected $table = 'additionals';

     protected $section = 'additionals';


     protected $fillable = ['name'];

     public function additionable()
     {
         return $this->morphTo();
     }
     
 }


