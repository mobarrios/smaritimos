<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;
 use App\Entities\Admin\Items;
 use Illuminate\Database\Eloquent\Model;

 class Brancheables extends Model
 {
     protected $fillable    = ['branches_id'];

     protected $section = 'brancheables';


     public function entities(){

         return $this->morphTo();
     }

     public function Branches()
     {
         return $this->belongsTo(Branches::class);
     }

     public function Items()
     {
         return $this->belongsTo(Items::class, 'entities_id');
     }
 }


