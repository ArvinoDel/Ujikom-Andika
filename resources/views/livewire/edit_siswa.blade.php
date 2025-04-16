<div class="mt-4 space-y-4">
    <h3 class="text-xl font-semibold">{{ __('Edit Data Siswa') }}</h3>

    <form wire:submit.prevent="updateSiswa" class="space-y-4">
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">{{ __('Nama') }}</label>
            <input wire:model="nama" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">{{ __('NISN') }}</label>
            <input wire:model="nisn" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div>
            <label for="nis" class="block text-sm font-medium text-gray-700">{{ __('NIS') }}</label>
            <input wire:model="nis" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">{{ __('Alamat') }}</label>
            <textarea wire:model="alamat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
        </div>

        <div>
            <label for="no_telp" class="block text-sm font-medium text-gray-700">{{ __('No Telp') }}</label>
            <input wire:model="no_telp" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="space-y-4">
            <div>
                <label for="id_kelas" class="block text-sm font-medium text-gray-700">
                    {{ __('Kelas') }}
                </label>
                <select wire:model="id_kelas"
                    id="id_kelas"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                    <option value="">{{ __('-- Pilih Kelas --') }}</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id_kelas }}">
                            {{ $kelas->nama_kelas }} - {{ $kelas->kompetensi_keahlian }}
                        </option>
                    @endforeach
                </select>
                @error('id_kelas') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        
            <div>
                <label for="id_spp" class="block text-sm font-medium text-gray-700">
                    {{ __('SPP') }}
                </label>
                <select wire:model="id_spp"
                    id="id_spp"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                    <option value="">{{ __('-- Pilih SPP --') }}</option>
                    @foreach ($sppList as $spp)
                        <option value="{{ $spp->id_spp }}">
                            {{ \Carbon\Carbon::parse($spp->date)->format('F Y') }} - Rp {{ number_format($spp->nominal, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('id_spp') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        

        <div class="flex items-center gap-4">
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
            </div>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="mt-2 text-sm text-green-600">{{ session('message') }}</div>
    @endif
</div>
