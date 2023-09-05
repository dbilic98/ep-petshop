<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container">
  <a class="navbar-brand" href="{{ url('/') }}">PetStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dogs')}}">PAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('cats')}}">MAČKA</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">MALE ŽIVOTINJE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">BLOG</a>
      </li>
    </ul>
  </div>


 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/login">PRIJAVA</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/register">REGISTRACIJA</a>
      </li>
    </ul>
</div>
 </div>

</nav>
