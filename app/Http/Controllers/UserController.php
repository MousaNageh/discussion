<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notifcations(){
        //mark as read

        auth()->user()->unreadNotifications->markAsRead() ;

        //display all notificatins
        return view("user.notifcations")->with("notifications",auth()->user()->unreadNotifications) ;
    }
}
