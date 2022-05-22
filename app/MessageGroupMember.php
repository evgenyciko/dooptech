<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageGroupMember extends Model
{
    protected $guarded = [];
    protected $table = 'message_group_member';

    public function message_group(){
        return $this->berlongsTo(MesssageGroup::class);

    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
