<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use Illuminate\Support\Facades\Validator;

class rolesController extends Controller
{

    public function store(Request $request){
        roles::create($request->all()); 
        return  json_encode(["RolCreado" => "1"]);             
    }
    public function update(request $request,$id){
        $validator = Validator::make($request->all(),[
            'id' => 'exists',
            'rol' =>'required'
        ]);

        if(roles::where('id',$id)->exists()){

            $role = roles::find($id);
            $role->rol = $request->rol;
            $role->save();     
        }

    }
    public function destroy($id){

        if(roles::where('id', $id)->exists()){
            $rol = roles::find($id);
            $rol->delete();
        
            return json_encode(["Borrado" => "1"]);

        }else{
            return json_encode(["Borrado" => "0"]);
        }

    }

    public function findAll(){
    $roles = roles::select("*")
    ->get();

    return $roles;
    }
}
