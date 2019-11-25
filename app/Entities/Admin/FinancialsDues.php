<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class FinancialsDues extends Entity
 {

     protected $table = 'financials_dues';

     protected $fillable = ['due','coef','porcent','financials_id'];

     protected $section = 'financialsDues';

     public function Financials()
     {
         return $this->belongsTo(Financials::getClass());
     }

     public function Budgets()
     {
         return $this->belongsToMany(Budgets::getClass())->withPivot('id');
     }


     public function Sales()
     {
         return $this->belongsToMany(Sales::getClass(), 'sales_financials_dues')->withPivot('id','amount','amount_dues');
     }

 }


