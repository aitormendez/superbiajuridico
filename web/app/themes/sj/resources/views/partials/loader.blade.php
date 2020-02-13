<div class="container">
  <div class="row d-flex justify-content-center pb-5">
    <div class="page-load-status px-sm-4">
      <div class="infinite-scroll-request">
        <div class="lds-ripple"><div></div><div></div></div>
      </div>
      <p class="infinite-scroll-last">{{ __('Fin del contenido', 'sage') }}</p>
      <p class="infinite-scroll-error">{{ __('No hay más páginas para cargar', 'sage') }}</p>
    </div>

    <div class="button-container d-none">
      <button class="view-more-button boton">{{ __('Ver más', 'sage') }}</button>
    </div>
  </div>
</div>
