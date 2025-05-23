<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas', 'kompetensi_keahlian'];

    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
