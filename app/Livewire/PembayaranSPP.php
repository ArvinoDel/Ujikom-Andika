<?php

namespace App\Livewire;

use App\Models\Pembayaran;
use Livewire\Component;

class PembayaranSPP extends Component
{

    public $pembayaran;
    public function mount()
    {
        // Mengambil semua data kelas
        $this->pembayaran = Pembayaran::all();
    }
    public function render()
    {
        return view('livewire.pembayaran-spp');
    }
}
