<?php
namespace App\Entities\Configs;

use App\Entities\Entity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Images extends Entity
{
    protected $fillable = ['path'];

    protected $table = 'images';

    protected $section = 'images';

    public function imageable()
    {
        return $this->morphTo();
    }
}
