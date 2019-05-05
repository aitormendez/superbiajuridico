<div class="page-header">

  @if (is_tax('article-type', 'rincon'))
      <div class="icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
  @elseif(is_tax('article-type', 'articulo') || is_tax('article-type', '%d1%81%d1%82%d0%b0%d1%82%d1%8c%d1%8f'))
      <div class="icon">
        <i class="fas fa-pen-fancy"></i>
      </div>
  @elseif(is_tax('article-type', 'comentario') || is_tax('article-type', '%d0%ba%d0%be%d0%bc%d0%bc%d0%b5%d0%bd%d1%82%d0%b0%d1%80%d0%b8%d0%b9'))
      <div class="icon">
        <i class="fas fa-comment"></i>
      </div>
  @elseif(is_tax('article-type', 'resumen') || is_tax('article-type', '%d0%ba%d1%80%d0%b0%d1%82%d0%ba%d0%be%d0%b5-%d1%81%d0%be%d0%b4%d0%b5%d1%80%d0%b6%d0%b0%d0%bd%d0%b8%d0%b5'))
      <div class="icon">
        <i class="fas fa-gavel"></i>
      </div>
  @endif

  <h1>{!! App::title() !!}</h1>
</div>
