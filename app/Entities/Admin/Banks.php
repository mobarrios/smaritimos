<?php
namespace App\Entities\Admin;


use App\Entities\Configs\Brancheables;
use App\Entities\Entity;

class Banks extends Entity
{

    protected $table = 'banks';

    protected $fillable = ['name'];
    protected $section = 'banks';





    public function Checkbooks()
    {
        return $this->hasOne(Checkbooks::class);
    }

}


