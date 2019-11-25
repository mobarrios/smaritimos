<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class Charges extends Entity
 {

     protected $table = 'charges';

     protected $fillable = ['date','amount','banks_id','number','check_date','check_pay_date','check_types_id','term','transf_date','financials_id','purchases_orders_id','pay_methods_id'];

     protected $section = 'charges';

     public function PurchasesOrders()
     {
         return $this->belongsTo(PurchasesOrders::class);
     }

     public function getDateAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setDateAttribute($value)
     {
         $this->attributes['date'] = date('Y-m-d',strtotime($value));
     }


     public function PayMethods()
     {
         return $this->belongsTo(PayMethods::class, 'pay_methods_id');
     }

    
 }


