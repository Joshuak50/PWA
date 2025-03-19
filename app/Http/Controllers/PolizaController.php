<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Poliza;
use Illuminate\Http\Request;

class PolizaController extends Controller
{

    public function index(Request $req){
        $clientes = Clientes::all();
        if($req->id){
            $poliza = Poliza::find($req->id);
        }
        else{
            $poliza = new Poliza();
        }
        return view('poliza',compact('poliza', 'clientes'));
    }

    public function getAPI(Request $req){
        $poliza = Poliza::find($req->id);
        return response()->json($poliza);
    }

    public function listAPI(){
        $polizas = Poliza::all();
        return $polizas;
    }

    public function polizaCliente($id_cliente){
        $polizas = Poliza::where('id_cliente', $id_cliente)->get();
        return $polizas;
    }

    public function poliza($id){
        $poliza = Poliza::find($id);
        return $poliza;
    }

    public function saveAPI(Request $req){
        if($req->id !=0){
            $poliza = Poliza::find($req->id);
        }
        else{
            $poliza = new Poliza();
        }

        $poliza -> total_horas = $req->total_horas;
        $poliza -> fecha_inicio = $req->fecha_inicio;
        $poliza -> fecha_fin = $req->fecha_fin;
        $poliza -> precio = $req->precio;
        $poliza -> id_cliente = $req->id_cliente;
        $poliza -> observaciones = $req->observaciones;
        $poliza->save();  
        return "Ok";
    }

    public function updateAPI(Request $req, $id){
        if($req->id !=0){
            $poliza = Poliza::find($req->id);
        }
        else{
            $poliza = new Poliza();
        }
        $poliza -> total_horas = $req->total_horas;
        $poliza -> fecha_inicio = $req->fecha_inicio;
        $poliza -> fecha_fin = $req->fecha_fin;
        $poliza -> precio = $req->precio;
        $poliza -> id_cliente = $req->id_cliente;
        $poliza -> observaciones = $req->observaciones;
        $poliza->save();  
        return "Ok";
    }

    public function deleteAPI($id){
        $poliza = Poliza::find($id);
        $poliza->delete();
        return "Ok";
    }
}
