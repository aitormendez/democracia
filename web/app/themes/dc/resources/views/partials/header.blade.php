<header class="banner d-flex flex-column align-items-start">
  <div class="logo bg-n d-flex align-items-center justify-content-center">
    @svg('logo')
  </div>
  <a class="brand mb-3" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex-column align-items-start']) !!}
    @endif
  </nav>
</header>
