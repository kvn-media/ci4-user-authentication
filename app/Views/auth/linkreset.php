<html5>
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


                    <h4>  Link Reset Password  </h4>
                    <p>  Demo: karena demo, link seharusnya di kirim ke email dengan token id yang dapat expire.  </p>
                    <br>
                        <a href="<?= site_url('auth/newPassword'); ?>" >Silahkan klik link reset password berikut </a>
                    </br>
                </div>
            </div>
    </div>
    <section> 
    </section>    
    <section> 
    </section>
   <div><?php include 'footer.html' ?></div> 
</body>
</html>