<?php include ROOT . 'app/view/partials/head.php' ?>


<form action="/register" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control" id="username" >
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" id="email" >
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" id="password" >
    </div>

    <div class="form-group">
        <label for="passwordRepeat">Confirm Password:</label>
        <input type="password" name="passwordRepeat" class="form-control" id="passwordRepeat" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include ROOT . 'app/view/partials/footer.php' ?>