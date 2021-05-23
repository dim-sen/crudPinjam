<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pinjams extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_pinjam', 'tgl_kembali', 'id_anggota'];

    public function anggotas(): BelongsTo {
        return $this -> belongsTo(Anggotas::class, 'id_anggota', 'id');
    }

    public function bukus(): BelongsToMany {
        return $this -> belongsToMany(Bukus::class, 'bukus_pinjams', 'pinjams_id', 'bukus_id');
    }
}
