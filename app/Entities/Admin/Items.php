<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;
 use Illuminate\Database\Eloquent\Model;

 class Items extends Entity
 {

     protected $table = 'items';

     protected $fillable = ['nombre','models_id','status','f_emision','f_vencimiento','cod_proveedor','n_serie','emitido_por','n_certificado','capacidad','items_capacidad_tipo_id','company_id','obs'];

     protected $section = 'items';
     

//     public function Certificates()
//     {
//         return $this->hasOne(Certificates::class);
//     }
     
     public function Models()
     {
         return $this->belongsTo(Models::class);
     }

     public function Dispatches()
     {
         return $this->belongsToMany(Dispatches::class,'dispatches_items');
     }


     public function Sales(){
         return $this->belongsToMany(Sales::class,'sales_items')->withPivot('price_actual','patentamiento','pack_service');
     }


     public function getModelName(){
         return $this->belongsTo(Model::class)->get()->name;
     }

     public function getBranchesAttribute()
     {
        return  $this->Brancheables->first()->Branches->name;
     }

     public function getFechaIngresoAttribute()
     {
         return  date('d-m-Y',strtotime($this->attributes['created_at']));
     }

     public function getStatusNameAttribute()
     {
         return config('status.items.' . $this->attributes['status']);
     }

     public function getFEmisionAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setFEmisionAttribute($value)
     {
         $this->attributes['f_emision'] = date('Y-m-d',strtotime($value));
     }

     public function getFVencimientoAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setFVencimientoAttribute($value)
     {
         $this->attributes['f_vencimiento'] = date('Y-m-d',strtotime($value));
     }
 }


