<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Penilaian Juri
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm" role="alert">
                    <p class="font-bold">Sukses</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-sm" role="alert">
                    <p class="font-bold">Perhatian</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="p-6 bg-white shadow sm:rounded-lg overflow-x-auto">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Daftar Peserta Lomba</h3>
                        <p class="text-sm text-gray-500">Tentukan status kelolosan peserta dan berikan catatan evaluasi.</p>
                    </div>
                    <span class="text-sm bg-blue-50 text-blue-700 font-semibold px-3 py-1 rounded-full border border-blue-200">
                        Total Peserta: {{ $pendaftarans->count() }}
                    </span>
                </div>

                @if($pendaftarans->isEmpty())
                    <div class="text-center py-10 text-gray-500 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                        <p class="text-base">Belum ada peserta yang mendaftar perlombaan.</p>
                    </div>
                @else
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-left text-sm text-gray-700">
                                <th class="border border-gray-300 p-3">Nama Siswa</th>
                                <th class="border border-gray-300 p-3">Kelas</th>
                                <th class="border border-gray-300 p-3">Kategori Lomba</th>
                                <th class="border border-gray-300 p-3">Status Saat Ini</th>
                                <th class="border border-gray-300 p-3 w-1/2">Form Penilaian Juri</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @foreach($pendaftarans as $daftar)
                            <tr class="hover:bg-gray-50 align-top">
                                <td class="border border-gray-300 p-3 font-semibold text-gray-900">
                                    {{ $daftar->user->name }}
                                    <div class="text-xs text-gray-500 font-normal">{{ $daftar->user->email }}</div>
                                </td>
                                <td class="border border-gray-300 p-3 text-gray-700">{{ $daftar->kelas }}</td>
                                <td class="border border-gray-300 p-3 font-medium text-blue-600">
                                    {{ $daftar->lomba->nama_lomba }}
                                </td>
                                <td class="border border-gray-300 p-3">
                                    @if($daftar->status == 'Lolos')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                            Lolos
                                        </span>
                                    @elseif($daftar->status == 'Tidak Lolos')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                                            Tidak Lolos
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            {{ $daftar->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 p-3">
                                    <form action="{{ route('juri.penilaian', $daftar->id) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div class="flex items-center gap-3">
                                            <label class="text-xs font-bold text-gray-600">Status:</label>
                                            <select name="status" class="border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500" required>
                                                <option value="Lolos" {{ $daftar->status == 'Lolos' ? 'selected' : '' }}>Lolos</option>
                                                <option value="Tidak Lolos" {{ $daftar->status == 'Tidak Lolos' ? 'selected' : '' }}>Tidak Lolos</option>
                                            </select>
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-md text-xs font-bold shadow-sm transition">
                                                Simpan Penilaian
                                            </button>
                                        </div>

                                        <div>
                                            <textarea name="catatan_juri" rows="2" placeholder="Tulis alasan/catatan untuk siswa (terutama jika tidak lolos)..." class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $daftar->catatan_juri }}</textarea>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
