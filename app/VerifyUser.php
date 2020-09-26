<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];
    protected $table = 'verify_user';
 	protected $fillable =['userid','token'];
    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
    }
}