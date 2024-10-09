<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    protected $table = "cotizaciones_credito";
    protected $primaryKey = 'id_cotizacion';
    protected $keyType = 'INT';
}
