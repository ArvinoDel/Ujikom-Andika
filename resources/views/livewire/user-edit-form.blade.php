<div class="space-y-4" x-data="{ open: false }" x-show="open" class="modal" x-init="window.addEventListener('openModal', () => open = true)">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 modal-content">
        <x-input label="Nama" wire:model.defer="name" />
        <x-input label="Email" wire:model.defer="email" />
        <x-input label="Password (Opsional)" wire:model.defer="password" type="password" />
        <x-select label="Role" wire:model="role">
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="siswa">Siswa</option>
        </x-select>
    </div>

    @if($role === 'siswa')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-input label="NISN" wire:model.defer="nisn" />
        <x-input label="NIS" wire:model.defer="nis" />
        <x-input label="Tanggal Lahir" wire:model.defer="tanggal_lahir" type="date" />
        <x-select label="Kelas" wire:model.defer="kelas_id">
            <option value="">Pilih Kelas</option>
            @foreach($kelasList as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
            @endforeach
        </x-select>
        <x-textarea label="Alamat" wire:model.defer="alamat" />
        <x-input label="No. Telepon" wire:model.defer="no_telp" />
        <x-select label="SPP" wire:model.defer="id_spp">
            <option value="">Pilih SPP</option>
            @foreach($sppList as $spp)
                <option value="{{ $spp->id }}">Rp {{ number_format($spp->nominal) }}</option>
            @endforeach
        </x-select>
    </div>
    @endif

    <div class="flex justify-end">
        <x-button wire:click="updateUser" spinner="updateUser">
            Simpan Perubahan
        </x-button>
    </div>
</div>

