<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bukus extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = ['id_buku', 'buku'];

    public function pinjams(): BelongsToMany {
        return $this -> belongsToMany(Pinjams::class, 'bukus_pinjams', 'bukus_id', 'pinjams_id');
    }
}
