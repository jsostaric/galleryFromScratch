<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Gallery</a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if(Session::getInstance()->isLoggedIn()): ?>
          <a class="nav-link" href="/private/index">Home</a>
        <?php else: ?>
          <a class="nav-link" href="/">Home</a>
        <?php endif ?>
      </li>
      <?php if(Session::getInstance()->isLoggedIn()): ?>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      <?php else: ?>
      <li>
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <?php endif ?>
    </ul>
  </div>
</nav>