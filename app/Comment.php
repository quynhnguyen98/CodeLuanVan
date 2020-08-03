<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $table='gopy';
    protected $primary_key='id_gopy';
     protected $fillable = ['id_gopy','id_taikhoan', 'id_tintuc', 'comment_id', 'noidung','create_at','status'];
    public function replies() {
	         return $this->hasMany('App\Comment','comment_id','id_gopy');
	}
	public function user()
	{
		return $this->belongsTo(User::class,'id_taikhoan','id_taikhoan');
	}

}
