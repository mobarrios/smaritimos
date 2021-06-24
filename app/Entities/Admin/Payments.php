<?php
 namespace App\Entities\Admin;


 use App\Entities\Configs\Vouchers;
 use App\Entities\Entity;

 class Payments extends Entity
 {

     protected $table = 'payments';

     protected $fillable = ['date','amount','banks_id','number','check_date','check_pay_date','check_types_id','term','transf_date','financials_id','sales_id','pay_methods_id'];

     protected $section = 'payments';

     public function Sales()
     {
         return $this->belongsTo(Sales::class);
     }

     public function getDateAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setDateAttribute($value)
     {
         $this->attributes['date'] = date('Y-m-d',strtotime($value));
     }


     public function Banks()
     {
         return $this->belongsTo(Banks::class);
     }

     public function PayMethods()
     {
         return $this->belongsTo(PayMethods::class, 'pay_methods_id');
     }

     public function Financials()
     {
         return $this->belongsTo(Financials::class);
     }


     public function Vouchers()
     {
         return $this->belongsToMany(Vouchers::class);
     }


 }


