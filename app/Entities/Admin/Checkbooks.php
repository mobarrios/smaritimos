<?php
 namespace App\Entities\Admin;


 use App\Entities\Configs\Company;
 use App\Entities\Entity;

 class Checkbooks extends Entity
 {

     protected $table = 'checkbooks';

     protected $fillable = ['n_cheque','n_chequera','amount','payment_date','charge_date','due_date','type','banks_id','company_id'];
     protected $section = 'checkbooks';


     public function Banks()
     {
         return $this->belongsTo(Banks::class);
     }

     public function Company()
     {
         return $this->belongsTo(Company::class);
     }


 }


