<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageGroup extends Model
{
    protected $guarded = [];
    protected $table = 'message_group';

    public function message_groups_members() {
        return $this->hasMany(MessageGroupMember::class);
    }

    public function user_messages() {
        return $this->hasMany(UserMessage::class);
    }
    public function users() {
        return $this->belongsToMany(User::class, 'user_messages',
            'message_id', 'sender_id')
            ->withTimestamps();
    }
   
    
}
