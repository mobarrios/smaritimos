<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class Branches extends Entity
 {

     protected $table = 'branches';

     protected $fillable = ['name', 'phone','address','type','company_id','punto_venta'];

     protected $section = 'branches';

     public function Company()
     {
         return $this->belongsTo(Company::getClass());
     }

 }


