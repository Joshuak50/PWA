<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAPI(Request $req){
        $user = User::find($req->id);
        return response()->json($user);
    }

    public function listAPI(){
        $users = User::all();
        return $users;
    }

    public function saveAPI(Request $req){
        if($req->id !=0){
            $user = User::find($req->id);
        }
        else{
            $user = new User();
        }

        $user -> name = $req->name;
        $user -> email = $req->email;
        $user -> password = Hash::make($req->password);
        $user -> rfc = $req->rfc;
        $user -> contacto = $req->contacto;
        $user -> telefono_contacto = $req->telefono_contacto;
        $user -> direccion = $req->direccion;
        $user -> rol = $req->rol;
        $user->save();  
        return "Ok";
    }

    public function updateAPI(Request $req, $id){
        if($req->id !=0){
            $user = User::find($req->id);
        }
        else{
            $user = new User();
        }
        $user -> id = $req->id;
        $user -> name = $req->name;
        $user -> email = $req->email;
        $user -> password = Hash::make($req->password);
        $user -> rfc = $req->rfc;
        $user -> contacto = $req->contacto;
        $user -> telefono_contacto = $req->telefono_contacto;
        $user -> direccion = $req->direccion;
        $user -> rol = $req->rol;
        $user->save();  
        return "Ok";
    }

    public function deleteAPI(Request $req, $id){
        $user = User::find($req->id);
        $user->delete();
        return "Ok";
    
    }
}
