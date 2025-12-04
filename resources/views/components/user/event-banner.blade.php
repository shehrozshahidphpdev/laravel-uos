@props(['title', 'navigation', 'banner', 'title'])
<section class="hero__banner" style="background-image: url('{{ asset('user/assets/images/event-banner.jpg')}}')">
  <div class="container">
    <h1 class="title">
      {{ $title }}
    </h1>
  </div>
</section>
<div class="breadcrumbs">
  <ul>
    <li><a href="{{ route('user.home') }}">Home</a></li>
    <li>{{ $navigation }}</li>
  </ul>
</div>