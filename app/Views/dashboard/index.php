<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('bootstrap-5.2.0/css/bootstrap.min.css'); ?>"  crossorigin="anonymous">
    </head>
    <body>
        <link rel="stylesheet" href="<?php echo base_url('headfootstyle.css'); ?>">
        <div><?php include 'header.html' ?></div>
       <div class="container">
            <div class="row pt-3">
                <div class="col-md-8 offset-2">
                    <h4> <?= $title; ?></h4>
                    <hr>
                    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">
          Image
      </th>
      <th scope="col">
          Name
      </th>
      <th scope="col">
          Email
      </th>
      <th scope="col">
          Action
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
          <img src="/images/<?= $userInfo['avatar']; ?>" alt="" width="200px" height="150px">
          <form action="<?= base_url('auth/uploadImage'); ?>"
                method="post"
                enctype="multipart/form-data">
              <input type="file"
                     class="form-control"
                     name="userImage"
                     size="10" />
              <hr>
              <input type="submit">
          </form>
      </th>
      <td>
          <?= $userInfo['firstname'] ." " . $userInfo['lastname']; ?>
      </td>
      <td>
          <?= $userInfo['email']; ?>
      </td>
      <td>
          <a href="<?= site_url('auth/logout'); ?>">Log out</a>
      </td>
    </tr>
  </tbody>
</table>
<?php
    if(!empty(session()->getFlashData('notification'))){
      ?>
          <div class="alert alert-info">
              <?=
                  session()->getFlashData('notification')
              ?>
          </div>
      <?php    
    }
?>
                </div>
            </div>
       </div>
       <div><?php include 'footer.html' ?></div>
    </body>
</html>