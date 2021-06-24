<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class System extends Entity
 {

     protected $table = 'system';

     protected $fillable = ['name', 'last_name','email', 'password'];

     protected $section = 'system';


 }


