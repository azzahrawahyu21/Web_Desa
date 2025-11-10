@extends('layouts.admin')

@section('title', 'Detail RW')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-[#0D4715] mb-4">
        Detail RW: {{ $rw->no_rw }}
    </h2>

    <div class="mb-6">
        <p><strong>Nomor RW:</strong> {{ $rw->no_rw }}</p>
        <p><strong>Nama Ketua RW:</strong> {{ $rw->nama_rw }}</p>
    </div>

    <hr class="my-4">

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold">Daftar RT</h3>
        <a href="{{ route('rt.create', ['id_rw' => $rw->id_rw]) }}" class="btn btn-primary">
            Tambah RT
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="border p-2">No</th>
                <th class="border p-2">Nomor RT</th>
                <th class="border p-2">Nama Ketua RT</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rts as $index => $rt)
                <tr class="border-b hover:bg-gray-100">
                    <td class="border p-2 text-center">{{ $index + 1 }}</td>
                    <td class="border p-2 text-center">{{ $rt->no_rt }}</td>
                    <td class="border p-2 text-center">{{ $rt->nama_rt }}</td>
                    <td class="border p-2 text-center">
                        <a href="{{ route('rt.edit', ['id_rw' => $rw->id_rw, 'id_rt' => $rt->id_rt]) }}" 
                           class="text-blue-600 hover:underline">Edit</a> |
                        <form action="{{ route('rt.destroy', ['id_rw' => $rw->id_rw, 'id_rt' => $rt->id_rt]) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus RT ini?')"
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-3">Belum ada data RT</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
