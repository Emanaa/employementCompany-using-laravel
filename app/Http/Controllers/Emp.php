<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class Emp extends Controller
{
    //

    public function index($id){
        $user= Employee::find($id)->toArray();
        return response()->json($user);
    }

  /*  public function search(){
        $user= Employee::all()->toArray();
//response()->json($user);
        return $user;
    }*/

    public function search(Request $request) {

//       $data = $request->get('data');

    $name =$request->firstname;

        $search_emps = Employee::where('firstName', 'like', "%{$name}%")
            ->get();

  //          print_r($name);

        $arr = Array('employ'=>$search_emps);

        return view('list',$arr);
            /*   return response()->json([
            'name' => $search_drivers
        ]);*/
    }
}
