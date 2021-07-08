<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class BudgetsItems extends Entity
 {

     protected $table = 'budgets_items';

     protected $fillable = ['price_actual', 'price_budget', 'budgets_id','models_id', 'colors_id'];

     protected $section = 'budgetsItems';


     public function Budgets()
     {
         return $this->belongsTo(Budgets::class);
     }

     public function Models()
     {
         return $this->belongsTo(Models::class);
     }

 }


