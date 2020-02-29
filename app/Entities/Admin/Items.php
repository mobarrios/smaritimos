<?php
 namespace App\Entities\Admin;

 use Mail;
 use App\Entities\Entity;
 use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


 class Items extends Entity
 {

     protected $table = 'items';

     protected $fillable = ['nombre','models_id','status','f_emision','f_vencimiento','cod_proveedor','n_serie','emitido_por','n_certificado','capacidad','items_capacidad_tipo_id','company_id','obs','sent'];

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
        if(is_null($value))
        {
           return null;            
        }
        else
        {
         return date('d-m-Y',strtotime($value));
        }
     }

     public function setFEmisionAttribute($value)
     {
        if($value == "")
        {
            $this->attributes['f_emision'] = null;             
        }
        else
        {
             $this->attributes['f_emision'] = date('Y-m-d',strtotime($value));
        }
     }

     public function getFVencimientoAttribute($value)
     {
            if(is_null($value))
        {
           return null;            
        }
            else
        {
         return date('d-m-Y',strtotime($value));
        }
     }

     public function setFVencimientoAttribute($value)
     {
        if($value == "")
        {
            $this->attributes['f_vencimiento'] = null;             
        }
        else
        {
         $this->attributes['f_vencimiento'] = date('Y-m-d',strtotime($value));
        }  
     }


     public function getIsVencidoAttribute(){

        $dias_ant   = $this->Models->dias_vto;
        $vto        = $this->attributes['f_vencimiento'];
        $today      = date('Y-m-d');


        $created    = new Carbon($vto);
        $now        = Carbon::now();
        $difference =  $now->diffInDays($created,false);


        if($vto == "")
            return false;

        if(($difference + 1 ) <= 0  )
        {
             return false;
        }
        else
        {   
            if(($difference+1) <= $dias_ant)
            {
                    if(!$this->sent){
                            Mail::send('mails.vto', ['id' => $this->id],
                             function ($m)  {
                                $m->from('help@coders.com.ar', 'coders.com.ar');
                                $m->to('armamento@serviciosmaritimos.com','Servicios Maritimos')->subject('Vencimiento de Artículo!');
                                $this->sent = 1;
                                $this->save();
                                });
                        }

                return true;
            }

             
        }
        
     }

 }


