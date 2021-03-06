<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\CreateDiscussionRequest;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;

class DiscussionController extends Controller
{
    public function __construct()
    {    //ad "verified" to middleware if using verfing
        $this->middleware(["auth"])->only(["create","store"]) ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("discussions.index")->with("discussions",Discussion::filterByChannels()->paginate(2)) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("discussions.create") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
                "title"=>$request->title ,
                "content"=>$request->content ,
                "slug"=>Str::slug($request->title),
                "channel_id"=>$request->channel

        ]);
        return redirect(route("discussion.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view("discussions.show")
        ->with("discusion",$discussion)
        ->with("replies",$discussion->reply()->paginate(2));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function reply(Discussion $discussion , Reply $reply){
            $discussion->markAsBestReply($reply) ;
            session()->flash("success","the reply of ".$reply->owner->name."is marked as a best reply") ;
            return redirect()->back() ;

    }
}
