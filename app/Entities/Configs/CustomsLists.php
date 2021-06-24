<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class CustomsLists extends Entity
 {

     protected $table = 'customs_lists';

     protected $fillable = ['name', 'phone','address','type','company_id','punto_venta'];

     protected $section = 'customsLists';

     
 }


