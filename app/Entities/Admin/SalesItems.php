<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class SalesItems extends Entity
 {

     protected $table = 'sales_items';

     protected $fillable = ['sales_id','items_id','price_actual','cant' ];

     protected $section = 'salesItems';


     public function Items()
     {
         return $this->belongsTo(Items::class);
     }


     public function Sales()
     {
         return $this->belongsTo(Sales::class);
     }


 }


