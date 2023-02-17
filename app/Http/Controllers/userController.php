<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return json_encode(["creado" => "0"]);
        }
        User::create($request->all()); 
        return  json_encode(["creado" => "1"]);   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function find(){
        $usuarios = User::join('roles', 'users.rol_id', '=', 'roles.id')
        ->select('users.*', 'roles.rol')
        ->with('rol')
        ->get();
        return $usuarios;
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
        $validator = Validator::make($request->all(),[
            'id' => 'exists',
            
        ]);

        if($validator->fails()){
            return json_encode(["error" => "falla"]);
        }

        if(User::where('id',$id)->exists()){
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->age = $request->age;
            $user->phone = $request->phone;
            $user->rol_id = $request->rol_id;
            $user->salery = $request->salery;
                
            if($request->password == ""){
              $user->password = $user->password;

              }
              else
              {
              $user->password = $request->password;

            }
            
            $user->save();
            return json_encode(["Actualizado" => "el usuario se ha actualizado correctamente"]);
        }else{
            return json_encode(["No actualizado" => "no se ha actualizado"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(User::where('id',$id)->exists()){
            $user = User::find($id);
            $user->delete();

            return json_encode(["Borrado"=>"1"]);
        }else{
            return json_encode(["Borrado" => "0"]);
        }
    }
}
