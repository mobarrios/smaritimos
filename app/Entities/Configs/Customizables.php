<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class Customizables extends Entity
 {

     protected $table = 'customizables';

     protected $fillable = ['name', 'phone','address','type','company_id','punto_venta'];

     protected $section = 'customizables';

    

 }


