<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\notification;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function add(Request $request){
        notification::create($request->all()); 
        return  json_encode(["notificando" => "1"]);   
    }

   public function get(){
    $notifications = notification::all();
    return $notifications;
   }
}
