<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\Profiles;
use App\Http\Repositories\BaseRepo;


class ProfilesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Profiles();
    }

    

}