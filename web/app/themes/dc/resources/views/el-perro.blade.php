{{--
  Template Name: El Perro
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="container-fluid">
      <div class="row">
        <div class="caja">
          @include('partials.content-page')
        </div>
      </div>
    </div>
  @endwhile


@query([
  'post_type' => 'project',
  'nopaging' => true,
  'paged' =>  get_query_var( 'paged' ),
  'tax_query' => [
    [
      'taxonomy' => 'collective',
      'field'    => 'slug',
      'terms'    => 'el-perro',
    ]
  ]
])

<div id="accordionProjects">
  @posts
    @include('partials.content-'.get_post_type())
  @endposts
</div>


@php
    $t = get_term_by('slug', 'bibliografia', 'exhibition');
@endphp

@query([
  'post_type' => 'cv',
  'nopaging' => true,
  'tax_query' => [
    'relation' => 'AND',
    [
      'taxonomy' => 'collective',
      'field'    => 'slug',
      'terms'    => 'el-perro',
    ],
    [
      'taxonomy' => 'exhibition',
      'field'    => 'term_id',
      'terms'    => $t->term_id,
      'operator' => 'NOT IN',
    ],
  ]
])

@php  $anios = []; @endphp

@posts
  @php
      $anio = get_the_date('Y');
  @endphp
    @if (!in_array($anio, $anios))
    @php $anios[] = $anio; @endphp
  @endif
@endposts

<section class="exhibit">
  @foreach ($anios as $anio)
    <div class="anio container-fluid">
      <div class="row">
        <div class="caja">
          <h2>{{ $anio }}</h2>
        </div>
      </div>
    </div>
    @query([
      'post_type' => 'cv',
      'nopaging'  => true,
      'date_query'=> [
        'year' => $anio,
      ],
      'tax_query' => [
        'relation' => 'AND',
        [
          'taxonomy' => 'exhibition',
          'field'    => 'slug',
          'terms'    => ['exposiciones-individuales'],
        ],
        [
          'taxonomy' => 'collective',
          'field'    => 'slug',
          'terms'    => ['el-perro'],
        ],
      ],
    ])

    @hasposts
      <div class="epi container-fluid">
        <div class="row">
          <div class="caja">
            <h3>{{ __('Solo Shows', 'sage') }}</h3>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
            <ul class="caja">
              @posts
                @include('partials.content-'.get_post_type())
              @endposts
            </ul>
        </div>
      </div>
    @endhasposts

    @query([
      'post_type' => 'cv',
      'nopaging'  => true,
      'date_query'=> [
        'year' => $anio,
      ],
      'tax_query' => [
        [
          'taxonomy' => 'exhibition',
          'field'    => 'slug',
          'terms'    => ['exposiciones-colectivas'],
        ],
        [
          'taxonomy' => 'collective',
          'field'    => 'slug',
          'terms'    => ['el-perro'],
        ],
      ],
    ])

    @hasposts
    <div class="epi container-fluid">
      <div class="row">
        <div class="caja">
          <h3>{{ __('Group Shows', 'sage') }}</h3>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <ul class="caja">
          @posts
            @include('partials.content-'.get_post_type())
          @endposts
        </ul>
      </div>
    </div>
    @endhasposts
  @endforeach
</section>

<section class="biblio">
  @query([
    'post_type' => 'cv',
    'nopaging'  => true,
    'tax_query' => [
      [
        'taxonomy' => 'exhibition',
        'field'    => 'slug',
        'terms'    => ['bibliografia'],
      ],
      [
        'taxonomy' => 'collective',
        'field'    => 'slug',
        'terms'    => ['el-perro'],
      ],
    ],
  ])

  @hasposts
  <div class="epi-biblio container-fluid">
    <div class="row">
      <div class="caja">
        <h2>{{ __('Bibliography', 'sage') }}</h2>
      </div>
    </div>
  </div>
    <div class="container-fluid">
      <div class="row">
        <ul class="caja">
          @posts
            @include('partials.content-'.get_post_type())
          @endposts
        </ul>
      </div>
    </div>
  @endhasposts
</section>





@endsection
