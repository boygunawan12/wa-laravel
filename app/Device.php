<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
class Device extends Model
{
    //
    protected $table = 'device';
    public $incrementing = false;


    public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
    });
}



}
