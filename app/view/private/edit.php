<?php include ROOT . 'app/view/partials/head.php' ?>

<?php if (isset($message)): ?>
  <div>
    <p class="alert-danger pt-2 pb-2 pl-2">
        <?php echo $message; ?>
    </p>
  </div>
<?php endif ?>

<h1>Change Password</h1>

<form action="update" method="post">
    <label for="oldPassword">Enter Old Password:</label>
    <input type="password" name="oldPassword" id="oldPassword"      class="form-control" >

    <label for="password">Enter New Password:</label>
    <input type="password" name="password" id="password"      class="form-control" >

    <label for="confirmPassword">Confirm New Password:</label>
    <input type="password" name="confirmPassword"
        id="confirmPassword" class="form-control" >

    <input type="hidden" name="id" value="<?= Session::getInstance()->getUser()->id ?>">
    <button class="btn btn-primary mt-2">Submit</button>
</form>

<?php include ROOT . 'app/view/partials/footer.php' ?>