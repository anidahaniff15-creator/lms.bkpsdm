<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pelatihan - Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Pelatihan</h3>
                    <a href="{{ route('pelatihan.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm transition">
                        + Tambah Pelatihan
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Pelatihan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kuota</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelaksanaan</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pelatihans as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->judul }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->pendaftarans_count ?? 0 }} / {{ $item->kuota }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }} - 
                                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <span class="px-2 py-1 inline-flex text-xs font-bold rounded-full {{ strtolower($item->status) === 'buka' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ strtoupper($item->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center space-x-2">
                                        <a href="{{ route('admin.pelatihan.pendaftar', $item->id) }}" class="text-emerald-600 hover:text-emerald-900 bg-emerald-50 px-3 py-1 rounded text-xs font-semibold">
                                            Peserta ({{ $item->pendaftarans_count ?? 0 }})
                                        </a>
                                        <a href="{{ route('pelatihan.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                                        <form action="{{ route('pelatihan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pelatihan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Belum ada data pelatihan.
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