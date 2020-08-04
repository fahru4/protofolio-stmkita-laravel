<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis','nama','username','email','password','alamat','tlp','tgl_lahir',
    'jk', 'status', 'foto','user_id'];

    public function getFoto()
    {
        if($this->foto){
            return asset('admin/gambar/user.png');
        }
        return asset('admin/gambar'.$this->foto);
    }
    function user(){
        return $this->belongsTo('App\User');
    }
}
