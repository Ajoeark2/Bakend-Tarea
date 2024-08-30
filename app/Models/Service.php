<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    public function clients()
    {
        //return $this->belongsToMany(Client::class,'clients_services');
        return $this->belongsToMany(Client::class, 'clientes_servicios', 'servicio_id', 'cliente_id');
    }
}
