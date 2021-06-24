<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class DispatchesInvoices extends Entity
 {

     protected $table = 'dispatches_invoices';

     protected $fillable = ['date','number','total','sub_total','flete','seguro','iva_total','iva_percepcion','iibb_percepcion','dispatches_id'];

     protected $section = 'dispatchesInvoices';

     public function Dispatches()
     {
         return $this->hasMany(Dispatches::class);
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


