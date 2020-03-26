@component('components.bg-image-hero', ['image' => $img_portada_qj])
<div class="container">
  <div class="row d-flex align-items-center">
    <div class="texto col-sm-7 col-md-6 order-sm-1">
      {!! $hero_txt_qj !!}
      <img class="w-50" src="@asset('images/logo-legal-touch.png')">
    </div>
      <div class="col-sm-3 col-md-4">
        <a href="{{ $contact_link }}" class="preguntanos">{{ __('Pregúntanos', 'sage') }}</a>
      </div>
  </div>
</div>

  <a id="flecha-1"><i class="fas fa-arrow-circle-down"></i></a>
@endcomponent

