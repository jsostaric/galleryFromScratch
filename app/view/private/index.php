<?php include ROOT . 'app/view/partials/head.php' ?>

<h1>Welcome, <?php echo Session::getInstance()->getUser()->username ?>!</h1>

<a href="myAccount" class="btn btn-primary mt-2 mb-2">My Account</a>
<hr>

<div class="col-md-4 offset-4">
    <div class="jumbotron">
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

        <form action="store" method="post" enctype="multipart/form-data">
            <div>
                <label for="image">Upload image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-primary mt-2" value="submit">
        </form>
    </div>
</div>

<hr>

<h2>All Pictures</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($images as $image): ?>
        <tr>
            <td><img src="/<?= $image->name ?>" class="image"></td>
            <td><?=$image->username ?>(<?=$image->email ?>)</td>
            <td><?php if ($image->uid == Session::getInstance()->getUser()->id):?>
            <form method="post" action="delete">
                <input type="hidden" name="imageId" value="<?=$image->id?>">
                <button>Delete</button>
            </form>
                <?php endif ?>
             </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php include ROOT . 'app/view/partials/footer.php' ?>