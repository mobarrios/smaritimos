<?php
namespace App\Entities\Admin;


use App\Entities\Configs\Brancheables;
use App\Entities\Entity;

class SmallBoxes extends Entity
{

    protected $table = 'small_boxes';

    protected $fillable = ['entry', 'date', 'amount', 'detail', 'types_small_boxes_id','providers_id'];

    protected $section = 'smallBoxes';



    public function Providers()
    {
        return $this->belongsTo(Providers::class);
    }

    public function TypesSmallBoxes()
    {
        return $this->belongsTo(TypesSmallBoxes::class);
    }


    public function setDateAttribute($data){
        $this->attributes['date'] = date('Y-m-d',strtotime($data));
    }

    public function getDateAttribute(){
        return date('d-m-Y',strtotime($this->attributes['date']));
    }

    public function getEntryAttribute(){
        return config('models.smallBoxes.entry')[$this->attributes['entry']];
    }
}


