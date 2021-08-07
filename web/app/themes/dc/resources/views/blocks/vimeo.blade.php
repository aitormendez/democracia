{{--
  Title: Plyr
  Description: Incrusta un video con Plyr
  Category: embed
  Icon: controls-play
  Keywords: video vimeo youtube
  Mode: edit
  Align: center
  PostTypes: project external
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
  EnqueueStyle: styles/block-vimeo.css
  EnqueueScript: scripts/block-vimeo.js
--}}

<div class="contenedor w-100 my-4 {{ $block['classes'] }}">
	<div class="un-video" otra-cosa="{{ get_field('video_provider') }}" data-plyr-provider="{{ get_field('video_provider') }}" data-plyr-embed-id="{{ get_field('vimeo_id') }}"></div>
</div>
