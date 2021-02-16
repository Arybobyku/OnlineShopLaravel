<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatting extends Model
{
    protected $fillable = [
        'token','email'
    ];

    public function detailChatting(){
        return $this->hasMany(detailChatting::class,'id_email','id');
    }
}
