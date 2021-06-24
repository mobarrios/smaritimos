<?php
namespace App\Entities\Configs;

use App\Entities\Entity;
use Illuminate\Database\Eloquent\Model;

class Logs extends Entity
{
    protected $fillable = ['user_id','log'];

    protected $section = 'logs';


    public function logeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
