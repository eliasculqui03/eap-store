<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'nombre',
        'apellidos',
        'telefono',
        'direccion_calle',
        'ciudad',
        'distrito',
        'provincia',
        'departamento',
        'codigo_postal',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }

    public function nombreCompleto(): String
    {
        return "{$this->nombre} {$this->apellidos}";
    }
}
