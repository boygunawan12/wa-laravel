<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
class User extends Model
{
    //
    protected $table = 'users';
    public $incrementing = false;


    public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
}



public function verifyUser()
{
  return $this->hasOne('App\VerifyUser','userid');
}



}
