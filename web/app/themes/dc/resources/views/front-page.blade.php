@extends('layouts.app')

@section('content')

<section class="hero d-flex">
  @if ($hero_tipo == 'video')
    <div class="plyr__video-embed w-100" id="player">
      <iframe
          src="https://player.vimeo.com/video/@option('hero_video')?loop=false&amp;title=false&amp;gesture=media"
          allowfullscreen
          allowtransparency
      ></iframe>
    </div>
  @endif
  @if ($hero_tipo == 'imagen')
    @component('components.bg-image', [
      'image' => $img_horiz_portada,
      'class' => 'landscape',
      'href' => $href,
    ])
    @endcomponent
    @component('components.bg-image', [
      'image' => $img_vert_portada,
      'class' => 'portrait',
      'href' => $href,
    ])
    @endcomponent
  @endif
</section>

@endsection
