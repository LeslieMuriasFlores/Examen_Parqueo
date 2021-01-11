<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estacionamiento extends Model
{
    use HasFactory;
    protected $table = "estacionamiento";

    protected $primaryKey = 'id_estacionamiento';
}
