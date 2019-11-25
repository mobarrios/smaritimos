<?php
 namespace App\Entities\Configs;


 use App\Entities\Entity;
 use Illuminate\Support\Facades\Hash;

 class Profiles extends Entity
 {
     protected $table = 'users';
     protected $fillable = ['user_name','name', 'last_name','email', 'password','branches_active_id'];

     protected $section = 'profiles';

     public function setPasswordAttribute($pass)
     {
         if(!empty($pass))
             $this->attributes['password'] = Hash::make($pass);
         else
             $this->attributes['password']  = $this->attributes['password'] ;
     }
     public function images()
     {
         return $this->morphOne(Images::class,'imageable');
     }
 }


