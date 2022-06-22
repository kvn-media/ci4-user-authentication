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
            <div class="row mt-3">
                <div class="col-md-4 offset-4">
                    <h4>
                        Sign In
                    </h4>
                    <hr>
                    <?php
                        if(!empty(session()->getFlashData('success'))) {
                            ?>
                                <div class="alert alert-success">
                                    <?= 
                                        session()->getFlashData('success')
                                    ?>
                                </div>
                            <?php
                        } else if(!empty(session()->getFlashData('fail'))) {
                            ?>
                                <div class="alert alert-danger">
                                    <?= 
                                        session()->getFlashData('fail')
                                    ?>
                                </div>
                            <?php
                        }
                    ?>

                    <form action="<?= base_url('auth/loginUser') ?>" 
                          method="post"
                          class="form mb-3">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" 
                                   class="form-control"
                                   name="email"
                                   value="<?= set_value('email'); ?>"
                                   placeholder="Masukan Email">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'email') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" 
                                   class="form-control"
                                   name="password"
                                   value="<?= set_value('password'); ?>"
                                   placeholder="Masukan Password">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'password') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            <div>
                            <input type="submit" 
                                   class="btn btn-info"
                                   value="Sign In">
                            </div>       
                            <br>
                                <a href="<?= site_url('auth/forgotPassword'); ?>" >Saya lupa password </a>
                            </br>
                        </div>
                    </form>

                    <br>
                    <a href="<?= site_url('auth/register'); ?>">
                        Buat akun baru
                    </a>
                </div>
            </div>
        </div>
        <div><?php include 'footer.html' ?></div>
    </body>
</html>