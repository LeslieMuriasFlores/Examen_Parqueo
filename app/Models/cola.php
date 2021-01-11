<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cola extends Model
{
    use HasFactory;
    protected $table = "cola";
    protected $primaryKey = 'id_cola';
}
