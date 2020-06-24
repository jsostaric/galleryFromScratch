<?php include ROOT . 'app/view/partials/head.php' ?>

<?php if (isset($message)): ?>
  <div>
    <p class="alert-danger pt-2 pb-2 pl-2"><?php echo $message ?></p>
  </div>
<?php endif ?>

<?php if (isset($success)): ?>
  <div>
    <p class="alert-success pt-2 pb-2 pl-2"><?php echo $success ?></p>
  </div>
<?php endif ?>


<form action="/login" method="post">
    <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember">
    <label class="form-check-label" for="remember">Remember Me</label>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include ROOT . 'app/view/partials/footer.php' ?>