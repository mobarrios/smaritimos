<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class PurchasesListsPricesItems extends Entity
 {

     protected $table = 'purchases_lists_prices_items';

     protected $fillable = ['price_list','price_net','max_discount','obs','models_id','purchases_lists_prices_id'];

     protected $section = 'purchasesListsPricesItems';


     public function PurchasesListsPrices()
     {
        return $this->belongsTo(PurchasesListsPrices::class);
     }

     public function Models()
     {
         return $this->belongsTo(Models::class);
     }


 }


