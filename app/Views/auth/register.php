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
                        Sign Up
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


                    <form action="<?= base_url('Auth/registerUser') ?>" 
                          method="post"
                          class="form mb-3">
                        <?= csrf_field(); ?>

                        <div class="form-group mb-3">
                            <label for="">Name Awal</label>
                            <input type="text" 
                                   class="form-control"
                                   name="firstname"
                                   value="<?= set_value('firstname'); ?>"
                                   placeholder="Masukan nama awal">

                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'firstname') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Name Akhir</label>
                            <input type="text" 
                                   class="form-control"
                                   name="lastname"
                                   value="<?= set_value('lastname'); ?>"
                                   placeholder="Masukan nama akhir">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'lastname') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">E-mail</label>
                            <input type="text" 
                                   class="form-control"
                                   value="<?= set_value('email'); ?>"
                                   name="email"
                                   placeholder="Masukan Email">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'email') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" 
                                   class="form-control"
                                   value="<?= set_value('password'); ?>"
                                   name="password"
                                   placeholder="Masukan Password min. 5">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'password') : '' ?>
                                   </span>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" 
                                   class="form-control"
                                   value="<?= set_value('passwordConfirm'); ?>"
                                   name="passwordConfirm"
                                   placeholder="Masukan Ulang Password">
                                   <span class="text-danger text-sm">
                                        <?= isset($validation) ? display_form_error($validation, 'passwordConfirm') : '' ?>
                                   </span>
                        </div>

                        <div class="form-group mb-3">
                            
                            <input type="submit" 
                                   class="btn btn-info"
                                   value="Sign Up">
                        </div>
                    </form>
                    <br>
                    <a href="<?= site_url('auth'); ?>">
                        Saya sudah mempunyai akun, login
                    </a>
                </div>
            </div>
        </div>
        <div><?php include 'footer.html' ?></div>
    </body>
</html>