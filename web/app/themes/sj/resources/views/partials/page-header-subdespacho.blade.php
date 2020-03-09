<div class="page-header p-4 mt-md-4 text-center w-100">
  @if ($despacho == 'superbia')
    <div class="icon">
      <i class="fas fa-quercus"></i>
    </div>
  @elseif($despacho == 'quercus')
    <div class="icon">
      <i class="fas fa-superbia"></i>
    </div>
  @endif

    <nav class="menu-textos-wrap">
      @if (has_nav_menu($menus['subdespacho_navigation']))
      {!! wp_nav_menu(['theme_location' => $menus['subdespacho_navigation'], 'menu_class' => 'submenu']) !!}
      @endif
    </nav>
</div>
