
<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm font-normal leading-none text-slate-500">
              ID Pembayaran
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm font-normal leading-none text-slate-500">
              id_user
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm font-normal leading-none text-slate-500">
              nisn
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm font-normal leading-none text-slate-500">
              Created At
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($spp as $sppItem)
        <tr class="hover:bg-slate-50 border-b border-slate-200">
          <td class="p-4 py-5">
            <p class="block font-semibold text-sm text-slate-800">{{$sppItem->id_spp}}</p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">{{$sppItem->tahun}}</p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">{{$sppItem->nominal}}</p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">{{$sppItem->created_at}}</p>
          </td>
          <td class="p-4 py-5">
              <div class="block text-center">
                  <button class="text-slate-600 hover:text-slate-800">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                          <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                      </svg>
                  </button>
                  <button class="text-slate-600 hover:text-slate-800">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
                          <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
                      </svg>
                  </button>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>