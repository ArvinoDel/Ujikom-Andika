<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
// Tambahkan use HasOne dan HasMany di atas (opsional tapi rapi)
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // tambahkan ini kalau belum
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    // 🔗 Relasi ke siswa
    public function siswa(): HasOne
    {
        return $this->hasOne(Siswa::class);
    }

    // 🔗 Relasi ke pembayaran (jika user sebagai petugas/admin pencatat)
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_user');
    }

    // 🔧 Scope untuk role (opsional, tapi berguna)
    public function scopeSiswa($query)
    {
        return $query->where('role', 'siswa');
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }
}
