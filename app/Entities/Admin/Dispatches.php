<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class Dispatches extends Entity
 {

     protected $table = 'dispatches';

     protected $fillable = ['purchases_orders_id','date','number','providers_id'];

     protected $section = 'dispatches';

     public function Models()
     {
         return $this->hasMany(Models::class);
     }

     public function Items()
     {
         return $this->belongsToMany(Items::class, 'dispatches_items');
     }


     public function Invoices()
     {
         return $this->hasOne(DispatchesInvoices::class);
     }


     public function DispatchesItems()
     {
         return $this->hasMany(DispatchesItems::class);
     }



     public function PurchasesOrders()
     {
         return $this->belongsTo(PurchasesOrders::class);
     }

     public function Providers()
     {
         return $this->belongsTo(Providers::class);
     }



     public function getDateAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setDateAttribute($value)
     {
         $this->attributes['date'] = date('Y-m-d',strtotime($value));
     }
 }


