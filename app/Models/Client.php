<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    public function services()
    {
        //return $this->belongsToMany(Service::class,'clients_services');
        return $this->belongsToMany(Service::class, 'clientes_servicios', 'cliente_id', 'servicio_id');
    }
}
