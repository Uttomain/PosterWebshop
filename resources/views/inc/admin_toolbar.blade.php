<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Toolbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">View Website</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/admin/showproductslist">Manage Products</a>
                </li>
                          
           </ul>
           <ul class="navbar-nav">
              
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                  >{{ __('Logout') }}</a>
                </li> 

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                <li class="nav-item">
                    <a class="nav-link"><b>Admin</b></a>
                  </li> 

                
        </ul>
        </div>
      </nav>
