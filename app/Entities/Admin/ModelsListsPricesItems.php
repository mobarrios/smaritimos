<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class ModelsListsPricesItems extends Entity
 {

     protected $table = 'models_lists_prices_items';

     protected $fillable = ['price_list','price_net','price_public','max_discount','obs','models_id','models_lists_prices_id'];

     protected $section = 'modelsListsPricesItems';

     public function ModelsListsPrices()
     {
        return $this->belongsTo(ModelsListsPrices::class);
     }

     public function Models()
     {
         return $this->belongsTo(Models::class);
     }


 }


