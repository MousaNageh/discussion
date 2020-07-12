<?php
namespace App ;
class Discussion extends Model
{
    public function author(){
        return $this->belongsTo(User::class,"user_id") ;
    }
    //to override route model pinding to use slug instead of id
    public function getRouteKeyName()
    {
        return "slug" ;
    }
    public function reply(){
        return $this->hasMany(Reply::class) ;
    }
    public function bestReply(){
        return $this->belongsTo(Reply::class,"reply_id") ;
    }
    public function markAsBestReply(Reply $reply){
        $this->update([
            "reply_id"=>$reply->id
        ]);
    }
}
