<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class KelasList extends Component
{
    public $kelas;

    public function mount()
    {
        // Mengambil semua data kelas
        $this->kelas = Kelas::all();
    }

    public function render()
    {
        return view('livewire.kelas-list');
    }
}
