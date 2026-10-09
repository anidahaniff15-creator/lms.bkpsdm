<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pelatihan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pelatihan.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                @csrf
                <div>
                    <label class="block font-medium mb-1">Judul Pelatihan</label>
                    <input type="text" name="judul" class="w-full border rounded-lg p-2" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded-lg p-2" rows="4" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="w-full border rounded-lg p-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="w-full border rounded-lg p-2" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Kuota</label>
                        <input type="number" name="kuota" class="w-full border rounded-lg p-2" min="1" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Status</label>
                        <select name="status" class="w-full border rounded-lg p-2" required>
                            <option value="draft">Draft</option>
                            <option value="buka">Buka</option>
                            <option value="tutup">Tutup</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-4">
                    <a href="{{ route('pelatihan.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Simpan Pelatihan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>