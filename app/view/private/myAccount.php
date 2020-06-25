<?php include ROOT . 'app/view/partials/head.php' ?>

<h1>Profile Page</h1>

<p>User's account</p>

<p><a href="edit" class="btn btn-success">Change Password</a></p>
<form action="/destroy" method="post">
    <button class="btn btn-danger mt-2">Remove Account</button>
</form>

<?php include ROOT . 'app/view/partials/footer.php' ?>