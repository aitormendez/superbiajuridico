{{--
  Template Name: Sentencias-SJ
--}}

@extends('layouts.app')

@section('content')
  <nav>
    <ul class="tabs">
      <li><a href="{{ get_bloginfo('url') }}/sentences">Sentencias relevantes</a></li>
      <li><span>Sentencias de Superbia Jurídico</span></li>
    </ul>
  </nav>
  @php
    // var_dump($query_sentence_sj);
  @endphp
  <ul class="infinite-scroll-container">
    @while($query_sentence_sj->have_posts()) @php $query_sentence_sj->the_post() @endphp
      @include('partials.content-sentence')
    @endwhile
  </ul>
@endsection
@php
  wp_reset_postdata();
@endphp
