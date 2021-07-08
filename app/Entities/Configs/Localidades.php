<?php
namespace App\Entities\Configs;


use App\Entities\Entity;
use App\Entities\Moto\Registros;

class Localidades extends Entity
{

    protected $table = 'localidades';

    protected $fillable = ['name','municipio_id'];

    protected $section = 'localidades';

    public function Municipios()
    {
        return $this->belongsTo(Municipios::class,'municipio_id');
    }

    public function Registros()
    {
        return $this->hasMany(Registros::getClass());
    }

}
