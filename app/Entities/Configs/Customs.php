<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class Customs extends Entity
 {

     protected $table = 'customs';

     protected $fillable = ['name', 'phone','address','type','company_id','punto_venta'];

     protected $section = 'customs';

     
 }


