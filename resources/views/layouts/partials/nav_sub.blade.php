<!-- start section navbar -->
<nav id="main-nav-subpage" class="subpage-nav">
  <div class="row">
    <div class="container">

      <div class="logo">
        <a href="{{ route('frontend.index') }}"><img src="{{ asset('folio/images/logo.png') }}" alt="logo"></a>
      </div>

      <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

      <ul class="nav-menu list-unstyled">
        <li><a href="{{ route('frontend.index') }}" class="smoothScroll">Home</a></li>
        <li><a href="#about" class="smoothScroll">About</a></li>
        {{-- <li><a href="#portfolio" class="smoothScroll">Portfolio</a></li> --}}
        <li><a href="#blog" class="smoothScroll">Blog</a></li>
        {{-- <li><a href="#contact" class="smoothScroll">Contact</a></li> --}}
      </ul>
    </div>
  </div>
</nav>
<!-- End section navbar -->