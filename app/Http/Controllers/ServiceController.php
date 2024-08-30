<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->nombre = $request->nombre;
        $service->descripcion = $request->descripcion;
        $service->precio = $request->precio;
        $service->disponible = $request->disponible ?? true;
        $service->fecha_inicio = $request->fecha_inicio;
        $service->fecha_fin = $request->fecha_fin;
        $service->save();
        
        $data = [
            'message' => 'Servicio creado correctamente',
            'service' => $service,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $service = Service::findOrFail($id);
            return response()->json($service);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Servicio no encontrado"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->nombre = $request->nombre;
        $service->descripcion = $request->descripcion;
        $service->precio = $request->precio;
        $service->disponible = $request->disponible ?? $service->disponible;
        $service->fecha_inicio = $request->fecha_inicio;
        $service->fecha_fin = $request->fecha_fin;
        $service->save();
        
        $data = [
            'message' => 'Servicio actualizado correctamente',
            'service' => $service,
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json([
            'message' => 'Servicio eliminado correctamente',
            'service' => $service,
        ]);
    }

    public function clients(Request $request)
    {
        $service = Service::find($request->service_id);
        if (!$service) {
            return response()->json(["message" => "Servicio no encontrado"], 404);
        }
        $clients = $service->clients;
        $data = [
            'message' => 'Clientes asociados',
            'clients' => $clients
        ];
        return response()->json($data);
    }
}
