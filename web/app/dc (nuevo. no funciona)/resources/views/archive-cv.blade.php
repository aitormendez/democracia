@extends('layouts.app')

@php  $anios = []; @endphp

@while (have_posts())
  @php
    the_post();
    $anio = get_the_date('Y');
  @endphp
  @if (!in_array($anio, $anios))
    @php $anios[] = $anio; @endphp
  @endif
@endwhile

@section('content')
  @include('partials.page-header')

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
              'terms'    => ['democracia'],
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
              'terms'    => ['democracia'],
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
            'terms'    => ['democracia'],
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
