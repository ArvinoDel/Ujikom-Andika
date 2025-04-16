<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Siswa;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $filterRole = 'all';

    protected $queryString = ['search', 'filterRole'];

    protected $listeners = ['user-added' => '$refresh', 'user-deleted' => '$refresh'];

    protected $listener = ['openDeleteModal'];

    public $isDeleteModalOpen = false; // Menambahkan properti untuk kontrol modal hapus


    public function openDeleteModal($userId)
    {
        $this->isDeleteModalOpen = true; // Membuka modal
        $this->selectedUserId = $userId; // Menyimpan ID user yang dipilih untuk dihapus
    }

    

    public $selectedUserId; // Menyimpan ID user yang dipilih

    public function editUser($userId)
    {
        $this->selectedUserId = $userId;
        $this->dispatch('openEditModal', $userId); // Menggunakan dispatch, bukan emit
    }
    

    public function deleteUser()
    {
        $user = User::findOrFail($this->selectedUserId);
        $user->delete();

        session()->flash('message', 'User berhasil dihapus.');
        $this->isDeleteModalOpen = false; // Menutup modal setelah penghapusan
    }

    


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterRole()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->when($this->filterRole !== 'all', function ($query) {
            $query->where('role', $this->filterRole);
        })
        ->with(['siswa.kelas']) // jika role siswa
        ->paginate(1); // Menyesuaikan pagination sesuai kebutuhan

    return view('livewire.user-table', compact('users'));
    }
    
}

