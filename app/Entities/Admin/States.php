<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class States extends Entity
 {

     protected $table = 'states';
     protected $fillable = ['description'];
     protected $section = 'states';


     
 }


