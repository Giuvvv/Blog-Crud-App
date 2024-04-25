<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><b>></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Inside the block of Auth you can visualize Home and Logout only if you are logged in -->
        @auth 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        <!-- Else you visualize Login and Registration  -->
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/registration">Registration</a>
        </li>

        @endauth
        
      </ul>
      <!-- Inside this Auth you will visualize your username on the left if you are logged in  -->
      @auth
      <span class="navbar-text">
        {{Auth::user()->name}}
      </span>
      @endauth
    </div>
  </div>
</nav>