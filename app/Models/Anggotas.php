<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotas extends Model
{
    use HasFactory;
    protected $fillable = ['id_anggota', 'nama', 'no_telp'];
}
