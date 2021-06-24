<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class DispatchesItems extends Entity
 {

     protected $table = 'dispatches_items';

     protected $fillable = ['dispatches_id','items_id','purchases_orders_items_id'];

     protected $section = 'dispatchesItems';

     public function Items()
     {
         return $this->belongsTo(Items::class);
     }
     
     public function Dispatches()
     {
         return $this->belongsTo(Dispatches::class);
     }

     public function PurchasesOrdersItems()
     {
         return $this->belongsTo(PurchasesOrdersItems::class);
     }

     public function DispatchesItems()
     {
         return $this->belongsTo(DispatchesItems::class);
     }

    
 }


