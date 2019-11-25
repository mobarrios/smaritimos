<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class Categories extends Entity
 {

     protected $table = 'categories';

     protected $fillable = ['name'];
     protected $section = 'categories';


     public function Models()
     {
         return $this->belongsToMany(Models::class,'models_categories');
     }
 }


