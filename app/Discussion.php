<?php
namespace App ;

use App\Notifications\ReplayAsbestReply;

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
    public function scopefilterByChannels($builder){
        if(request()->query("channel")){
            //filter
            $channel = Channel::where('slug',request()->query("channel"))->first() ;
            if($channel){
                return $builder->where("channel_id",$channel->id) ;
            }
        }
        return $builder ;

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
        if($reply->owner->id==$this->author->id){
            return ;
        }
        $reply->owner->notify(new ReplayAsbestReply($reply->discussion)) ;
    }
}
