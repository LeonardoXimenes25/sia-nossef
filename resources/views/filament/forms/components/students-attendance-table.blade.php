<div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-200 bg-white">
    <table class="w-full">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <tr>
                <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider w-16">No</th>
                <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama Siswa</th>
                <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider w-48">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @php
                $students = $getState() ?? [];
            @endphp

            @foreach($students as $index => $s)
                @php
                    $cleanName = trim($s['name']);
                @endphp
                <tr class="hover:bg-blue-50/80 transition-all duration-200 group">
                    <td class="px-4 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-4 py-4 text-gray-900 font-medium text-sm">{{ $cleanName }}</td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <select 
                            wire:model.defer="students.{{ $index }}.status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm font-medium cursor-pointer bg-white"
                        >
                            <option value="presente" class="text-green-600 font-medium">✅ Presente</option>
                            <option value="moras" class="text-yellow-600 font-medium">⏰ Moras</option>
                            <option value="lisensa" class="text-blue-600 font-medium">📄 Lisensa</option>
                            <option value="falta" class="text-red-600 font-medium">❌ Falta</option>
                        </select>
                    </td>
                </tr>
            @endforeach

            @if(count($students) === 0)
                <tr>
                    <td colspan="3" class="px-4 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400 space-y-2">
                            <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                            <p class="text-base font-medium text-gray-500">Tidak ada data siswa</p>
                            <p class="text-sm text-gray-400">Data siswa akan muncul di sini</p>
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
