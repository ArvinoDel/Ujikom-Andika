<?php

namespace App\Livewire;

use App\Models\Spp;
use Livewire\Component;

class ListSPP extends Component
{

    public $spp;
    public function mount()
    {
        // Mengambil semua data kelas
        $this->spp = Spp::all();
    }
    public function render()
    {
        return view('livewire.list-spp');
    }
}