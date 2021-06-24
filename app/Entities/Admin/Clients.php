<?php
 namespace App\Entities\Admin;


 use App\Entities\Configs\Localidades;
 use App\Entities\Entity;
 use App\Entities\Configs\IvaConditions;


 class Clients extends Entity
 {

     protected $table = 'clients';

     protected $fillable = ['name','last_name','email','dni','sexo','marital_status','dob','nacionality','phone1',
                            'phone2','address', 'city','location','province','obs','prospecto','iva_conditions_id',
                            'localidades_id'];

     protected $section = 'clients';


     public function Budgets()
     {
         return $this->hasMany(Budgets::class);
     }


     public function Sales()
     {
         return $this->hasMany(Sales::class)->with('Items');
     }
     
     public function SalesItems(){
         return $this->hasManyThrough(SalesItems::class,Sales::class)->with('items');
     }

     public function getFullNameAttribute(){
         return $this->attributes['last_name'].' '.$this->attributes['name'];
     }

     public function getLocalidadAttribute(){
         return ucfirst(strtolower($this->attributes['city'])).', '.ucfirst(strtolower($this->attributes['location'])).', '.ucfirst(strtolower($this->attributes['province']));
     }

     public function getFullAddressAttribute(){
         if($this->attributes['localidades_id']){
             $localidad = Localidades::find($this->attributes['localidades_id']);
             $local = $localidad->name .', '. $localidad->Municipios->name . ', '. $localidad->Municipios->Provincias->name ;

         }

         $address = $this->attributes['address'];
         $address .= ', ';
         $address .= isset($local) ? $local : '' ;

         return $address;

     }

     public function IvaConditions()
     {
         return $this->belongsTo(IvaConditions::class);
     }
     

 }


