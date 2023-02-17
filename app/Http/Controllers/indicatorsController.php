<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class indicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCountsPerUser()
    {
        
        // $counts = \DB::table('users')
        // ->select('role', \DB::raw('count(*) as count'))
        // ->groupBy('role')
        // ->get();
        // return $counts;
        $usuarios = User::select('roles.rol', \DB::raw('count(*) as count'))
            ->join('roles', 'users.rol_id', '=', 'roles.id')
            ->groupBy('roles.rol')
            ->get();
        return $usuarios;
    }

    
}
