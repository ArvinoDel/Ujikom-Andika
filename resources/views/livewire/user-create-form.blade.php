<flux:modal name="edit-profile" class="md:w-96">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Tambah User</flux:heading>
            <flux:text class="mt-2">Lengkapi data user baru.</flux:text>
        </div>

        <flux:input label="Name" placeholder="Nama" wire:model.defer="name" />
        <flux:input label="Email" type="email" wire:model.defer="email" />
        <flux:input label="Password" type="password" wire:model.defer="password" />

        <div>
            <label class="block mb-1 font-semibold">Role</label>
            <select wire:model="role" class="w-full px-3 py-2 border rounded-md">
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
            </select>
        </div>

        @if($role === 'siswa')
        <flux:input label="NISN" wire:model.defer="nisn" />
        <flux:input label="NIS" wire:model.defer="nis" />
        <flux:input label="Tanggal Lahir" type="date" wire:model.defer="tanggal_lahir" />

        <div>
            <label class="block mb-1 font-semibold">Kelas</label>
            <select wire:model="id_kelas" class="w-full px-3 py-2 border rounded-md">
                <option value="">Pilih Kelas</option>
                @foreach($kelasList as $kelas)
                @if($kelas)
                <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                @endif
                @endforeach
            </select>

        </div>

        <flux:input label="Alamat" wire:model.defer="alamat" />
        <flux:input label="No Telepon" wire:model.defer="no_telp" />

        <div>
            <label class="block mb-1 font-semibold">SPP</label>
            <select wire:model="id_spp" class="w-full px-3 py-2 border rounded-md">
                <option value="">Pilih SPP</option>
                @foreach($sppList as $spp)
                @if($spp)
                        <option value="{{ $spp->id_spp }}">{{ $spp->tahun }} - Rp{{ number_format($spp->nominal, 0, ',', '.') }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        @endif


        <div class="flex">
            <flux:spacer />
            <flux:button type="button" wire:click="saveUser" variant="primary">Simpan</flux:button>
        </div>
    </div>
</flux:modal>

<script>
    Livewire.on('close-modal', () => {
        // Nutup semua modal Flux yang terbuka
        document.querySelectorAll('flux-modal').forEach(modal => {
            if (modal.open) modal.close();
        });
    });
</script>