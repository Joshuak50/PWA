<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{

    public function index() {
        $servicios = Servicio::with(['cliente'])->get();
        return response()->json($servicios);
    }

    public function getAPI(Request $req){
        $servicio = Servicio::find($req->id);
        return response()->json($servicio);
    }

    public function listAPI(){
        $servicios = Servicio::all();
        return $servicios;
    }

    public function serviciosSF($id_cliente){
        $servicios = Servicio::whereNull('id_factura')
            ->whereNull('id_poliza')
            ->where('id_cliente', $id_cliente)
            ->get();
        return $servicios;
    }

    public function servicio($id){
        $servicio = Servicio::find($id);
        return $servicio;
    }

    public function saveAPI(Request $req){
        if($req->id !=0){
            $servicio = Servicio::find($req->id);
        }
        else{
            $servicio = new Servicio();
        }

        $servicio -> id_cliente = $req->id_cliente;
        $servicio -> id_tecnico = $req->id_tecnico;
        $servicio -> fecha = $req->fecha;
        $servicio -> horas = $req->horas;
        $servicio -> observaciones = $req->observaciones;
        $servicio -> id_poliza = $req->id_poliza;
        $servicio->save();  
        return "Ok";
    }

    public function updateAPI(Request $req, $id){
        if($req->id !=0){
            $servicio = Servicio::find($req->id);
        }
        else{
            $servicio = new Servicio();
        }
        $servicio -> id_cliente = $req->id_cliente;
        $servicio -> id_tecnico = $req->id_tecnico;
        $servicio -> fecha = $req->fecha;
        $servicio -> horas = $req->horas;
        $servicio -> observaciones = $req->observaciones;
        $servicio -> id_poliza = $req->id_poliza;
        $servicio->save();  
        return "Ok";
    }

    public function deleteAPI(Request $req, $id){
        $servicio = Servicio::find($req->id);
        $servicio->delete();
        return "Ok";
    
    }
}
