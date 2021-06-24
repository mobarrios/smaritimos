<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class Sizes extends Entity
 {

     protected $table = 'sizes';
     protected $fillable = ['name'];

     protected $section = 'sizes';

     
 }


