<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Livewire\Component;

class UserEditForm extends Component
{
    public $userId;

    public $name, $email, $password, $role;
    public $nisn, $nis, $tanggal_lahir, $kelas_id, $alamat, $no_telp, $id_spp;

    public $kelasList = [];
    public $sppList = [];
    protected $listeners = ['openEditModal'];

    public function openEditModal($userId)
    {
        $this->mount($userId);
        $this->dispatchBrowserEvent('openModal'); // Menampilkan modal via JavaScript
    }
    
    


    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($userId);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;

        if ($user->role === 'siswa' && $user->siswa) {
            $siswa = $user->siswa;
            $this->nisn = $siswa->nisn;
            $this->nis = $siswa->nis;
            $this->tanggal_lahir = $siswa->tanggal_lahir;
            $this->kelas_id = $siswa->kelas_id;
            $this->alamat = $siswa->alamat;
            $this->no_telp = $siswa->no_telp;
            $this->id_spp = $siswa->id_spp;
        }

        $this->kelasList = Kelas::all();
        $this->sppList = Spp::all();
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        if ($this->password) {
            $user->update(['password' => bcrypt($this->password)]);
        }

        if ($this->role === 'siswa') {
            $this->validate([
                'nisn' => 'required',
                'nis' => 'required',
                'tanggal_lahir' => 'required|date',
                'kelas_id' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'id_spp' => 'required',
            ]);

            $user->siswa()->updateOrCreate([], [
                'nisn' => $this->nisn,
                'nis' => $this->nis,
                'tanggal_lahir' => $this->tanggal_lahir,
                'kelas_id' => $this->kelas_id,
                'alamat' => $this->alamat,
                'no_telp' => $this->no_telp,
                'id_spp' => $this->id_spp,
            ]);
        }

        session()->flash('message', 'User berhasil diperbarui.');
        $this->dispatch('close-modal');
        $this->dispatch('user-updated');
    }

    public function render()
    {
        return view('livewire.user-edit-form');
    }
}
