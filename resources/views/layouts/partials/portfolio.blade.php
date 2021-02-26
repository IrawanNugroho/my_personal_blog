<!-- start section journal -->
<div id="journal" class="text-left paddsection">

  <div class="container">
    <div class="section-title text-center">
      <h2>Portfolio</h2>
    </div>
  </div>

  <div class="container">
    <div class="journal-block">
      <div class="row">

        {{-- @foreach ($list_article as $item)
        <div class="col-lg-4 col-md-6">
          <div class="journal-info">

          <a href="{{ route('frontend.show', $item->slug) }}"><img src="{{ asset('folio/images/blog-post-1.jpg') }}" class="img-responsive" alt="img"></a>

            <div class="journal-txt">

              <h4><a href="{{ route('frontend.show', $item->slug) }}">{{ $item->title }}</a></h4>
              <p class="separator">{{ $item->excerpt }}</p>

            </div>

          </div>
        </div>
        @endforeach --}}
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
      </div>
    </div>
  </div>

</div>
<!-- End section journal -->
