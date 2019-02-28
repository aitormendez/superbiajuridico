@php
  $tribunal = get_field('tribunal');
  $sentencia_no = get_field('sentencia_no');
  $fecha= get_field('fecha', false, false);
  $nombre= get_field('nombre', false, false);
  $fecha_datetime = new DateTime($fecha);
  $url_externa = get_field('url_externa');
  $pdf = get_field('pdf');
@endphp
@if ($sentencia_no == '')
  @php $identificador = $fecha_datetime->format('j/n/Y'); @endphp
@else
  @php $identificador = $sentencia_no . '/' . $fecha_datetime->format('Y'); @endphp
@endif
@if ($nombre == '')
  @php
    $nombre = 'Enlace';
  @endphp
@endif

<li class="infinite-scroll-item">

  <strong>{{ $tribunal}}-{{ $identificador }}@if (get_field('sj'))-(SJ)@endif</strong>
  <div class="col-der">
    <a href="{{ get_permalink() }}"> {{ $nombre }} </a> | <a href="{{ $pdf['url'] }}" target="_blank" alt="{{ $pdf['title'] }}">PDF</a>
  @if ($url_externa)
  |<a href="{{ $url_externa }}" target="_blank"> Ver en Cendoj</a>
  @endif
  </div>

</li>
