<?php
namespace App\Entities\Admin;

use \App\Entities\Entity;

class PayMethods extends Entity{

    protected $table = 'pay_methods';

    protected $fillable = ['name','method'];

    protected $section = 'payMethods';


    
}
