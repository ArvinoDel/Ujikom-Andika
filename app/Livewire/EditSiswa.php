<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;

class EditSiswa extends Component
{
    public $nama, $nisn, $nis, $alamat, $no_telp, $id_kelas, $id_spp;
    public $kelasList = [];
    public $sppList = [];

    public function mount()
    {
        // Ambil data kelas dan spp
        $this->kelasList = Kelas::all();
        $this->sppList = Spp::all();

        // Misalnya juga ambil data siswa
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();
        if ($siswa) {
            $this->nama = $siswa->nama;
            $this->nisn = $siswa->nisn;
            $this->nis = $siswa->nis;
            $this->alamat = $siswa->alamat;
            $this->no_telp = $siswa->no_telp;
            $this->id_kelas = $siswa->id_kelas;
            $this->id_spp = $siswa->id_spp;
        }
    }


    public function updateSiswa()
    {
        $user = Auth::user();

        $this->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nis' => 'required|string|max:20',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spp,id_spp',
        ]);

        Siswa::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nama' => $this->nama,
                'nisn' => $this->nisn,
                'nis' => $this->nis,
                'alamat' => $this->alamat,
                'no_telp' => $this->no_telp,
                'id_kelas' => $this->id_kelas,
                'id_spp' => $this->id_spp,
            ]
        );

        session()->flash('message', 'Data siswa berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.edit_siswa');
    }
}
