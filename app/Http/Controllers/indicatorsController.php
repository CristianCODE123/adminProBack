<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCountsPerUser()
    {
        
        $counts = \DB::table('users')
        ->select('role', \DB::raw('count(*) as count'))
        ->groupBy('role')
        ->get();
        return $counts;
       
    }

    
}
