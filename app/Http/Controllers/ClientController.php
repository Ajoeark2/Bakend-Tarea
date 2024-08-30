<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeClients = Client::with('services')->where('activo', 1)->get();
        $inactiveClients = Client::with('services')->where('activo', 0)->get();

        $activeArray = [];
        foreach ($activeClients as $client) {
            $activeArray[] = [
                "id" => $client->id,
                "nombre" => $client->nombre,
                "correo_electronico" => $client->correo_electronico,
                "telefono" => $client->telefono,
                "direccion" => $client->direccion,
                "fecha_nacimiento" => $client->fecha_nacimiento,
                "numero_documento" => $client->numero_documento,
                "tipo_documento" => $client->tipo_documento,
                "activo" => $client->activo,
                "servicios" => $client->services,
            ];
        }

        $inactiveArray = [];
        foreach ($inactiveClients as $client) {
            $inactiveArray[] = [
                "id" => $client->id,
                "nombre" => $client->nombre,
                "correo_electronico" => $client->correo_electronico,
                "telefono" => $client->telefono,
                "direccion" => $client->direccion,
                "fecha_nacimiento" => $client->fecha_nacimiento,
                "numero_documento" => $client->numero_documento,
                "tipo_documento" => $client->tipo_documento,
                "activo" => $client->activo,
                "servicios" => $client->services,
            ];
        }

        $data = [
            'clientes_activos' => $activeArray,
            'clientes_inactivos' => $inactiveArray,
        ];

        return response()->json($data);
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
        $client = new Client();
        $client->nombre = $request->nombre;
        $client->correo_electronico = $request->correo_electronico;
        $client->telefono = $request->telefono;
        $client->direccion = $request->direccion;
        $client->fecha_nacimiento = $request->fecha_nacimiento;
        $client->numero_documento = $request->numero_documento;
        $client->tipo_documento = $request->tipo_documento;
        $client->activo = $request->activo ?? true;
        $client->save();

        $data = [
            "message" => 'Cliente creado correctamente',
            "client" => $client,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $client = Client::with('services')->findOrFail($id);

            $data = [
                'message' => 'Detalles del cliente',
                'client' => $client,
                'services' => $client->services,
            ];
            return response()->json($data);

        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Cliente no encontrado"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->nombre = $request->nombre;
        $client->correo_electronico = $request->correo_electronico;   
        $client->telefono = $request->telefono;
        $client->direccion = $request->direccion;
        $client->fecha_nacimiento = $request->fecha_nacimiento;
        $client->numero_documento = $request->numero_documento;
        $client->tipo_documento = $request->tipo_documento;
        $client->activo = $request->activo ?? $client->activo;
        $client->save();

        $data = [
            "message" => 'Cliente actualizado correctamente',
            "client" => $client,
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->activo = 0;
        $client->save();

        $data = [
            "message" => 'Cliente marcado como inactivo',
            "client" => $client,
        ];
        return response()->json($data);
    }

    public function attach(Request $request)
    {
        $client = Client::find($request->client_id);
        if (!$client) {
            return response()->json(["message" => "Cliente no encontrado"], 404);
        }
        $validatedData = $request->validate([
            'service_id' => 'required|exists:servicios,id',
            'fecha_asignacion' => 'required|date',
        ]);
    
        $client->services()->attach($request->service_id, ['fecha_asignacion' => $request->fecha_asignacion]);
    
        $data = [
            "message" => "Servicio asociado correctamente",
            "client" => $client
        ];
        return response()->json($data);
    }
    

    public function detach(Request $request)
    {
        $client = Client::find($request->client_id);
        if (!$client) {
            return response()->json(["message" => "Cliente no encontrado"], 404);
        }
        $client->services()->detach($request->service_id);

        $data = [
            "message" => "Servicio desasociado correctamente",
            "client" => $client
        ];
        return response()->json($data);
    }
}
