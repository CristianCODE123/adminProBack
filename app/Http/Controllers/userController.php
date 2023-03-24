<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Streaming;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        public function userStreaming(){
            $streamings = DB::table('streamings')
            ->join('users', 'streamings.user_id', '=', 'users.id')
            ->select('streamings.*', 'users.*')
            ->get();

            return $streamings;
        }


     public function streaming(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'id' => 'exists',
            
        ]);

        if($validator->fails()){
            return json_encode(["error" => "falla"]);
        }


        if(User::where('id',$id)->exists()){
            $user = User::find($id);

            $user->stream = $request->stream;
          
            
            $user->save();
            return json_encode(["Actualizado" => "estado cambiado"]);
        }else{
            return json_encode(["No actualizado" => "estado no cambiado"]);
        }


     }

     public function getUserByEmail(Request $request){
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if ($user) {
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
     }
    public function store(Request $request)
    {
        

        $existingUser = User::where('email', $request->email)->first();

if ($existingUser) {
    return response()->json([
        'correo' => false,
        'message' => 'El correo ya está en uso.'
    ], 422);
}

        $validator = Validator::make($request->all(),[
            'username' => 'required|unique:users,username',
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no debe ser mayor a 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'email.unique' => 'El correo electrónico ya está en uso.',

        ]);

       
        
        if ($validator->fails()) {
            return $validator->errors()->toArray();
            
        }
        $user = new User(request()->all());
        $user->password = bcrypt($user->password);
        $user->save(); 
        if($request->rol_id == 5){
            $id = $user->id;
            $streaming = new Streaming;
            $streaming->user_id = $id;
            // Establece los valores de las demás columnas aquí
            $streaming->save();
        }
        


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
