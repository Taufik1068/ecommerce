
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="/login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="d-sm-none d-lg-inline-block"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                      {{ __('Logout') }}
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                      </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
