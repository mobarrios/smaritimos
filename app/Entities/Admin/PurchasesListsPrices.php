<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class PurchasesListsPrices extends Entity
 {

     protected $table = 'purchases_lists_prices';

     protected $fillable = ['number','status','providers_id'];
     protected $section = 'purchasesListsPrices';


     public function PurchasesListsPricesItems()
    {
        return $this->hasMany(PurchasesListsPricesItems::class);
    }

     public function Providers()
     {
         return $this->belongsTo(Providers::class);
     }
 }


