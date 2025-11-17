<div class="page-title">
  <div class="container">
    <div class="breadcrumbs" data-aos="fade-up">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Beranda</a></li>
          @isset($parent)
            <li class="breadcrumb-item"><a href="{{ $parentUrl ?? '#' }}">{{ $parent }}</a></li>
          @endisset
          <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
      </nav>
    </div>

    <div class="title-wrapper" data-aos="fade-up" data-aos-delay="100">
      <h1>{{ $title }}</h1>
      @isset($description)
        <p>{{ $description }}</p>
      @endisset
    </div>
  </div>
</div>