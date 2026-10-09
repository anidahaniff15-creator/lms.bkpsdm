<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Peserta Pelatihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $pelatihan->judul }}</h3>
                        <p class="text-sm text-gray-500">Total Pendaftar: {{ $pelatihan->pendaftarans->count() }} / {{ $pelatihan->kuota }} Kuota</p>
                    </div>
                    <a href="{{ route('pelatihan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-xs transition">
                        &larr; Kembali
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Peserta</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi Admin</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pelatihan->pendaftarans as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->user->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->user->email ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        @if(strtolower($item->status) === 'lulus')
                                            <span class="px-2.5 py-1 inline-flex text-xs font-bold rounded-full bg-green-100 text-green-800">
                                                LULUS
                                            </span>
                                        @else
                                            <span class="px-2.5 py-1 inline-flex text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">
                                                TERDAFTAR
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <form action="{{ route('admin.pendaftaran.status', $item->id) }}" method="POST" class="inline-flex space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            
                                            @if(strtolower($item->status) !== 'lulus')
                                                <input type="hidden" name="status" value="lulus">
                                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-1 px-3 rounded text-xs transition">
                                                    Set LULUS
                                                </button>
                                            @else
                                                <input type="hidden" name="status" value="terdaftar">
                                                <button type="submit" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-1 px-3 rounded text-xs transition">
                                                    Batal Lulus
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Belum ada peserta yang mendaftar di pelatihan ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>