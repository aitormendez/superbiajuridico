@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('La página que está intentando ver no existe.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
@endsection
