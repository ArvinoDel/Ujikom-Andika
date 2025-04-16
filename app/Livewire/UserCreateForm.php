<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\SPP;

class UserCreateForm extends Component
{
    public $name, $email, $password, $role = 'admin';
    public $nisn, $nis, $tanggal_lahir, $id_kelas, $alamat, $no_telp, $id_spp;
    public $kelasList, $sppList;



    public function mount()
    {
        $this->kelasList = Kelas::all();
        $this->sppList = Spp::all();
    }



    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,siswa',
        'id_kelas' => 'nullable|exists:kelas,id_kelas',
        'nis' => 'nullable|string',
        'tanggal_lahir' => 'nullable|date',
    ];

    public function saveUser()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,siswa',
            'nisn' => 'nullable|required_if:role,siswa|numeric|unique:siswa,nisn',
            'nis' => 'nullable|required_if:role,siswa|numeric|unique:siswa,nis',
            'tanggal_lahir' => 'nullable|required_if:role,siswa|date',
            'id_kelas' => 'nullable|required_if:role,siswa|exists:kelas,id_kelas',
            'alamat' => 'nullable|required_if:role,siswa|string',
            'no_telp' => 'nullable|required_if:role,siswa|string',
            'id_spp' => 'nullable|required_if:role,siswa|exists:spp,id_spp',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);

        if ($this->role === 'siswa') {
            $user->siswa()->create([
                'nisn' => $this->nisn,
                'nis' => $this->nis,
                'nama' => $this->name,
                'tanggal_lahir' => $this->tanggal_lahir,
                'id_kelas' => $this->id_kelas,
                'alamat' => $this->alamat,
                'no_telp' => $this->no_telp,
                'id_spp' => $this->id_spp,
            ]);
        }

        $this->reset(['name', 'email', 'password', 'role', 'nisn', 'nis', 'tanggal_lahir', 'id_kelas', 'alamat', 'no_telp', 'id_spp']);
        $this->dispatch('close-modal');
        $this->dispatch('user-added'); // Trigger refresh ke komponen tabel
        session()->flash('message', 'User berhasil ditambahkan.');
    }



    public function render()
    {
        return view('livewire.user-create-form');
    }
}
