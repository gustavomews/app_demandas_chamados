<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'datetime_open', 'datetime_end', 'user_id', 'status'];

    // Status
    // 0 - Pendente
    // 1 - Em andamento
    // 2 - Concluído
    // 4 - Cancelado
}
