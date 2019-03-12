@if (!have_posts())
  <div class="alert alert-warning">
    {{ __('No results found.', 'sage') }}
  </div>
  {!! get_search_form(false) !!}
@endif
