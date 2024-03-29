<header class="banner d-flex flex-column align-items-start">
    <div class="logo bg-n d-flex align-items-center justify-content-center p-5">
        @svg('logo')
    </div>
    <div class="solapa">
        <a class="brand mb-3" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
        <nav class="nav-primary d-block">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex-column align-items-start']) !!}
            @endif
        </nav>
    </div>
    <button class="hamburger hamburger--arrow is-active" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    <div id="buscar" class="vw-100 vh-100 bg-n fixed-top justify-content-center d-none" style="opacity: 0;">
        <a role="button" class="cruz text-r position-absolute">
            <i class="fad fa-cruz"></i>
        </a>

        {!! get_search_form(false) !!}
    </div>

</header>
