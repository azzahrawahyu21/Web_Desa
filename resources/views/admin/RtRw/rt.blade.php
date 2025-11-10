@extends('layouts.admin')

@section('title', 'Data RT di RW ' . $rw->nama_rw)

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
  <h2 class="text-2xl font-bold text-[#0D4715] mb-4">
    Data RT di RW {{ $rw->nama_rw }}
  </h2>

  {{-- Tombol Tambah RT --}}
  <div class="mb-4">
    <a href="{{ route('rt.create', ['id_rw' => $rw->id_rw]) }}"
       class="bg-[#0D4715] text-white px-4 py-2 rounded-lg hover:bg-[#146b22]">
      + Tambah RT
    </a>
  </div>

  {{-- Pesan Sukses --}}
  @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  {{-- Tabel Data RT --}}
  <table class="w-full border border-gray-300">
    <thead>
      <tr class="bg-gray-100 text-left">
        <th class="border p-2 text-center">No</th>
        <th class="border p-2">Nama RT</th>
        <th class="border p-2">Ketua RT</th>
        <th class="border p-2 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($rts as $index => $rt)
        <tr class="hover:bg-gray-50">
          <td class="border p-2 text-center">{{ $index + 1 }}</td>
          <td class="border p-2">{{ $rt->nama_rt }}</td>
          <td class="border p-2">{{ $rt->ketua_rt }}</td>
          <td class="border p-2 text-center">
            {{-- Tombol Edit --}}
            <a href="{{ route('rt.edit', ['id_rw' => $rw->id_rw, 'id_rt' => $rt->id_rt]) }}"
               class="text-blue-600 hover:underline">
              Edit
            </a> |

            {{-- Tombol Hapus --}}
            <form action="{{ route('rt.destroy', ['id_rw' => $rw->id_rw, 'id_rt' => $rt->id_rt]) }}"
                  method="POST"
                  class="inline"
                  onsubmit="return confirm('Yakin ingin menghapus RT ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 hover:underline">
                Hapus
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="border p-4 text-center text-gray-500">
            Belum ada data RT pada RW ini.
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
