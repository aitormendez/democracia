<footer class="content-info container-fluid bg-g5">
  <div class="row py-5">
    <nav class="col col-md-2 offset-md-2">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>

    <div class="social col col-md-2">
      <a href="https://www.facebook.com/democracia.colectivo.artistico/" class="mr-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.instagram.com/colectivodemocracia/">
        <i class="fab fa-instagram"></i>
      </a>
    </div>

    <div class="logo col col-md-2 offset-md-2">
      @svg('logo-pos')
    </div>
  </div>
</footer>
