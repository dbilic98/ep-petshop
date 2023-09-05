<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('dashboard')}}">
        <span class="ms-1 font-weight-bold text-white">Admin panel</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
              <a class="nav-link" href="{{ url('home') }}">
                  <i class="material-icons"></i>
                  <p>Naslovnica</p>
              </a>
          </li>
      <li class="nav-item">
              <a class="nav-link" href="{{ url('categories') }}">
                  <i class="material-icons"></i>
                  <p>Kategorija</p>
              </a>
          </li>
         
          <li class="nav-item">
              <a class="nav-link" href="{{ url('add-category') }}">
                  <i class="material-icons"></i>
                  <p>Dodaj kategoriju</p>
              </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('subcategories') }}">
            <i class="material-icons"></i>
            <p>Podkategorija</p>
          </a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="{{ url('add-subcategory') }}">
            <i class="material-icons"></i>
            <p>Dodaj podkategoriju</p>
          </a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="{{ url('products') }}">
            <i class="material-icons"></i>
            <p>Proizvod</p>
          </a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="{{ url('add-product') }}">
            <i class="material-icons"></i>
            <p>Dodaj proizvod</p>
          </a>
       </li>
          <li class="nav-item position-fixed bottom-4 max-width-200 ">
             <!--<a class="nav-link" href="{{route('logout')}}">
                  <i class="material-icons"></i>
                  <p>Logout</p>
              </a>
              -->
                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                     {{ __('Log out') }}
                 </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>

          </li>
      </ul>
    </div>

  </aside>
