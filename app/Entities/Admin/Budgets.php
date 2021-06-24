<?php
 namespace App\Entities\Admin;


 use App\Entities\Configs\User;
 use App\Entities\Entity;
 use App\Entities\Admin\BudgetsFinancialsDues;

 class Budgets extends Entity
 {

     protected $table = 'budgets';
     protected $fillable = ['date', 'clients_id','users_id','seguro','flete','formularios','gastos_administrativos','descuento','anticipo','importe_cuota','a_financiar','total'];
     protected $section = 'budgets';


     public function FinancialsDues()
     {
         return $this->belongsToMany(FinancialsDues::class)->withPivot('id');
     }


     public function Models()
     {
         return $this->hasMany(Models::class);
     }

     public function Clients()
     {
         return $this->belongsTo(Clients::class);
     }

     public function Users()
     {
         return $this->belongsTo(User::class);
     }

     public function allItems(){
         return $this->belongsToMany(Models::class,'budgets_items')->whereNull('budgets_items.deleted_at')->withPivot(['price_actual','price_budget','id','colors_id']);
     }

     public function modelsList(){
         $models = [];

         foreach ($this->allItems()->get() as $model){
             $models[$model->id] = $model->name;
         }

         return $models;
     }

     public function getDateAttribute(){
         return date("d-m-Y",strtotime($this->attributes['date']));
     }


     public function CheckFinancialsDue($value){

            if($this->FinancialsDues->count() > 0){
                foreach($this->FinancialsDues as $financialsDue){
                    if($value == $financialsDue->id)
                        return "checked='checked'";
                }
            }


     }

     public function getTotalEfectivoAttribute(){
        $price = collect();

        foreach($this->allItems as $item){
            $price->push($item->activeListPrice->price_net);
        }

        return $price->sum();

     }

 }


