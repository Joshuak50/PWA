<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Clientes::where('rol', 'C')->get();
        return $clientes;
    }

    public function tecnicos(){
        $clientes = Clientes::where('rol', 'T')->get();
        return $clientes;
    }

    public function client($id){
        $cliente = Clientes::find($id);
        return $cliente;
    }

    public function destroy($id){
        $cliente = Clientes::find($id);
        $cliente->delete();
        return "Ok";
    }

    public function store(Request $request){
        if($request->id != 0){
            $cliente = Clientes::find($request->id);
        }else{
            $cliente = new Clientes();
        }
        $cliente -> name = $request->name;
        $cliente -> email = $request->email;
        $cliente -> password = Hash::make($request->password);
        $cliente -> rfc = $request->rfc;
        $cliente -> contacto = $request->contacto;
        $cliente -> telefono_contacto = $request->telefono_contacto;
        $cliente -> direccion = $request->direccion;
        $cliente -> rol = "C";
        $cliente->save();

        return "Ok";
    }

    public function saveTecnico(Request $request){
        if($request->id != 0){
            $cliente = Clientes::find($request->id);
        }else{
            $cliente = new Clientes();
        }
        $cliente -> name = $request->name;
        $cliente -> email = $request->email;
        $cliente -> password = Hash::make($request->password);
        $cliente -> rfc = $request->rfc;
        $cliente -> contacto = $request->contacto;
        $cliente -> telefono_contacto = $request->telefono_contacto;
        $cliente -> direccion = $request->direccion;
        $cliente -> rol = "T";
        $cliente->save();

        return "Ok";
    }
}
