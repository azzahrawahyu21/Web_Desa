@extends('layouts.user')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4">{{ $kategori->nama_kategori }}</h2>

  @foreach($kategori->subkategoris as $sub)
    <div class="mb-5">
      <h5>{{ $sub->nama_subkategori }}</h5>
      <canvas id="chart{{ $sub->id_subkategori }}"></canvas>
    </div>
  @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  @foreach($kategori->subkategoris as $sub)
    new Chart(document.getElementById("chart{{ $sub->id_subkategori }}"), {
      type: 'bar',
      data: {
        labels: {!! json_encode($sub->dataStatistik->pluck('tahun')->map(fn($t)=>date('Y', strtotime($t)))) !!},
        datasets: [{
          label: 'Jumlah',
          data: {!! json_encode($sub->dataStatistik->pluck('jumlah')) !!},
          backgroundColor: 'rgba(13, 71, 21, 0.7)'
        }]
      }
    });
  @endforeach
</script>
@endsection
