<?php
 namespace App\Entities\Configs;

 use App\Entities\Entity;
 use Illuminate\Database\Eloquent\Model;

 class Updateables extends Entity
 {


     protected $fillable    = ['updateable_type','updateable_id', 'column', 'data_old'];

     protected $section = 'updateables';


     public function updateables(){

         return $this->morphTo();
     }

 }


