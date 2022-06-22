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
            <div class="row mt-3">
                <div class="col-md-4 offset-4">
      <form action="<?= base_url('auth/resetPasswordSuccess') ?>" 
                          method="post"
                          class="form mb-3">
        <h4>Silahkan buat password baru.</h4>                  
        <p>Password Baru:</p>
        <p>
            <input type="password" name="password" value="<?php echo set_value('password'); ?>" />
        </p>
        
        <p>Konfirmasi Password:</p>
        <p>
            <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" />
        </p>
        
        <p>
            <input type="submit" name="btnSubmit" value="Submit" />
        </p>
      </form>  
      </div>
      </div>
      </div>
      <section> 
      </section>
      <div><?php include 'footer.html' ?></div>
    </body>    
</html>