<div
    class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border dark:bg-gray-800 dark:text-gray-300">
    <div
        class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border dark:bg-gray-800 dark:text-gray-300">
        <div class="flex items-center justify-between gap-8 mb-8">
            <div>
                <h5
                    class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 dark:text-white">
                    Users list
                </h5>
                <p
                    class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700 dark:text-gray-400">
                    See information about all members
                </p>
            </div>
            <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                <flux:modal.trigger name="edit-profile">
                    <flux:button
                        class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none dark:bg-gray-700 dark:hover:shadow-lg dark:hover:shadow-gray-600"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" stroke-width="2" class="w-4 h-4">
                            <path
                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                            </path>
                        </svg>
                        Add member
                    </flux:button>
                </flux:modal.trigger>


                
                    @livewire('user-create-form')
              

            </div>
        </div>
        <div class="relative flex flex-col items-center justify-between gap-4 md:flex-row">
            <div class="block w-full overflow-hidden md:w-max">
                <nav>
                    <ul role="tablist"
                        class="relative flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60 dark:bg-gray-700">
                        <li role="tab" wire:click="$set('filterRole', 'all')"
                            class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900 dark:text-gray-300">
                            <div class="z-20 text-inherit cursor-pointer">
                                &nbsp;&nbsp;All&nbsp;&nbsp;
                            </div>
                            @if($filterRole === 'all')
                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow dark:bg-gray-800"></div>
                            @endif
                        </li>
                        <li role="tab" wire:click="$set('filterRole', 'siswa')"
                            class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900 dark:text-gray-300">
                            <div class="z-20 text-inherit cursor-pointer">
                                &nbsp;&nbsp;Siswa&nbsp;&nbsp;
                            </div>
                            @if($filterRole === 'siswa')
                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow dark:bg-gray-800"></div>
                            @endif
                        </li>
                        <li role="tab" wire:click="$set('filterRole', 'admin')"
                            class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900 dark:text-gray-300">
                            <div class="z-20 text-inherit cursor-pointer">
                                &nbsp;&nbsp;Admin&nbsp;&nbsp;
                            </div>
                            @if($filterRole === 'admin')
                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow dark:bg-gray-800"></div>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="w-full md:w-72">
                <div class="relative h-10 w-full min-w-[200px]">
                    <div
                        class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                        </svg>
                    </div>
                    <input wire:model.debounce.500ms="search"
                        class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                        placeholder=" ">
                    <label
                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900">
                        Search
                    </label>
                </div>
            </div>

        </div>
    </div>

    <div class="p-6 px-0 overflow-scroll dark:bg-gray-800">
        <table class="rounded-xl w-full mt-4 text-left table-auto min-w-max dark:text-gray-300 dark:border-gray-600">
            <thead>
                <tr>
                    <th
                        class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                        User</th>
                    <th
                        class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                        Role & Kelas</th>
                    <th
                        class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                        Status</th>
                    <th
                        class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                        Date Updated</th>
                    <th
                        class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <div wire:loading class="text-sm text-gray-500 italic">Loading...</div>
                @foreach ($users as $user)
                <tr class="dark:bg-gray-700 dark:border-gray-600">
                    <td class="p-4 border-b border-blue-gray-50 dark:border-gray-600">
                        <div class="flex items-center gap-3">
                            <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg"
                                alt="{{ $user->name }}"
                                class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                            <div class="flex flex-col">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 dark:text-gray-300">
                                    {{ $user->name }}</p>
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70 dark:text-gray-400">
                                    {{ $user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 dark:border-gray-600">
                        <div class="flex flex-col">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 dark:text-gray-300">
                                {{ ucfirst($user->role) }}</p>
                            @if($user->role === 'siswa')
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70 dark:text-gray-400">
                                {{ $user->siswa->kelas->nama_kelas ?? '-' }}</p>
                            @endif
                        </div>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 dark:border-gray-600">
                        <p
                            class="block font-sans text-sm antialiased font-normal leading-normal text-green-500 dark:text-green-400">
                            Active</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 dark:border-gray-600">{{ $user->updated_at->format('d M
                        Y') }}</td>
                    <td class="p-4 border-b border-blue-gray-50 dark:border-gray-600 text-right">
                        <svg wire:click="editUser({{ $user->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                          </svg>
                          
                          <svg wire:click="openDeleteModal({{ $user->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                          </svg>
                          
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
        <div x-data="{ open: @entangle('isDeleteModalOpen') }" x-show="open" class="modal">
            <div class="modal-content">
                <p>Apakah kamu yakin ingin menghapus user ini?</p>
                <button wire:click="deleteUser({{ $selectedUserId }})">Ya, Hapus</button>
                <button wire:click="$set('isDeleteModalOpen', false)">Batal</button>
            </div>
        </div>
        
    </div>
</div>