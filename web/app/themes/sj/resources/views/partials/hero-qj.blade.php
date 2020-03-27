@component('components.bg-image-hero', ['image' => $img_portada_qj])
<div class="container">
  <div class="row mt-lg-3">

    <div class="texto col-12 col-sm-6 my-2 order-sm-1">
      {!! $hero_txt_qj !!}
    </div>

    <div class="texto col-12 col-sm-3 my-2 order-sm-2">
      <img class="logo-legal-touch" src="@asset('images/logo-legal-touch.png')">
    </div>

    <div class="col-12 col-sm-3 my-3 order-sm-0">
      <a href="{{ $contact_link }}" class="preguntanos">{{ __('Pregúntanos', 'sage') }}</a>
    </div>

  </div>
</div>



  <a id="flecha-1"><i class="fas fa-arrow-circle-down"></i></a>
@endcomponent

