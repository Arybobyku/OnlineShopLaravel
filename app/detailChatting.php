<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailChatting extends Model
{
    protected $fillable = [
        'id_email','message'
    ];

    public function chatting(){
        return  $this->belongTo(chatting::class,'id_email','id');
    }
}
