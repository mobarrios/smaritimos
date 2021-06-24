<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class Colors extends Entity
 {

     protected $table = 'colors';
     protected $fillable = ['name'];

     protected $section = 'colors';

     
 }


