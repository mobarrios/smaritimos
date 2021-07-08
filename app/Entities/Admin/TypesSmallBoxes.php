<?php
namespace App\Entities\Admin;


use App\Entities\Configs\Brancheables;
use App\Entities\Entity;

class TypesSmallBoxes extends Entity
{

    protected $table = 'types_small_boxes';

    protected $fillable = ['name'];
    
    protected $section = 'typesSmallBoxes';




    public function SmallBoxes()
    {
        return $this->hasOne(SmallBoxes::class);
    }

}


