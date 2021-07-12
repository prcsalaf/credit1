<?php

namespace App\Http\Controllers;


use App\Models\Tbl_Regle;
use Illuminate\Http\Request;

class RegleController extends Controller
{
    //
 

    public function list()
    {
          $list = Tbl_Regle::all();

        return view("plugin" , [ "regless" => $list ] ) ;
    }

    public function listregle()
    {
         $list = Tbl_Regle::all();
        return  response()->json($list)  ;
    }
     public function update()
    {

    }
}
