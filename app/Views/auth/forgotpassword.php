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
            <h2>Lupa Password</h2>
            <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>
            <form action="<?= base_url('auth/showLinkResetPassword') ?>" 
                          method="post"
                          class="form mb-3">
                <p>Email:</p>
                <p>
                   <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
                </p>
            
                <div class="form-group mb-3">
                            <div>
                            <input type="submit" 
                                   class="btn btn-info"
                                   value="Submit">
                            </div>
            </form>
            </div>
            </div>
        </div>
        <section> 
        </section>
        <div><?php include 'footer.html' ?></div>    
    </body>
</html>