<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;

 class Company extends Entity
 {

     protected $table = 'company';

     protected $fillable = ['razon_social', 'nombre_fantasia','direccion', 'telefono','cuit','iva_conditions_id','inicio_actividades','ingresos_brutos'];

     protected $section = 'company';


    public function IvaConditions()
    {
        return $this->belongsTo(IvaConditions::getClass());
    }

 }


