<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function getAPI(Request $req){
        $factura = Factura::find($req->id);
        return response()->json($factura);
    }

    public function listAPI(){
        $facturas = Factura::all();
        return $facturas;
    }

    public function factura($id){
        $factura = Factura::find($id);
        return $factura;
    }

    public function saveAPI(Request $req){
        if($req->id !=0){
            $factura = Factura::find($req->id);
        }
        else{
            $factura = new Factura();
        }

        $factura -> id_cliente = $req->id_cliente;
        $factura -> fecha = $req->fecha;
        $factura -> monto = $req->monto;
        $factura -> observaciones = $req->observaciones;
        $factura->save();
        
        DB::table('servicios')
        ->where('id', $req->id_servicio)
        ->update(['id_factura' => $factura->id]);
        
        return "Ok";
    }

    public function updateAPI(Request $req, $id){
        if($req->id !=0){
            $factura = Factura::find($req->id);
        }
        else{
            $factura = new Factura();
        }
        $factura -> id_cliente = $req->id_cliente;
        $factura -> fecha = $req->fecha;
        $factura -> monto = $req->monto;
        $factura -> observaciones = $req->observaciones;

        DB::table('servicios')
        ->where('id', $req->id_servicio)
        ->update(['id_factura' => $factura->id]);
        
        $factura->save();  
        return "Ok";
    }

    public function deleteAPI(Request $req, $id){
        $factura = Factura::find($req->id);
        $factura->delete();
        return "Ok";
    
    }
}
