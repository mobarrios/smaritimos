<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\Logs;
use App\Http\Repositories\BaseRepo;

class LogsRepo extends BaseRepo {

    public function getModel()
    {
        return new Logs();
    }
    


}