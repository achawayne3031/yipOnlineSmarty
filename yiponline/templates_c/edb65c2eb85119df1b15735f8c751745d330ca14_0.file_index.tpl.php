<?php
/* Smarty version 5.4.0, created on 2024-08-28 00:19:03
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66ce50d71073f8_97794268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edb65c2eb85119df1b15735f8c751745d330ca14' => 
    array (
      0 => 'index.tpl',
      1 => 1724797138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66ce50d71073f8_97794268 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\yipOnlineSmarty\\yiponline\\templates';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YipOnline Interview Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>


    <div class="container">
        <div class="row">
        <div class="col-md-4 col-12"></div>

        <div class="col-md-4 col-12 mt-4">
            <h3 class="text-center">Register</h3>
            <?php if ($_smarty_tpl->getValue('message') != '') {?>
                <?php if ($_smarty_tpl->getValue('status')) {?>
                  <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $_smarty_tpl->getValue('message');?>

                  </div>
                <?php }?>

                <?php if (!$_smarty_tpl->getValue('status')) {?>
                  <div  class="alert alert-danger">
                    <strong>Warning!</strong> <?php echo $_smarty_tpl->getValue('message');?>

                  </div>
                <?php }?>
            <?php }?>

            <form method="POST" action="<?php echo $_smarty_tpl->getValue('URLROOT');?>
/index.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" value="<?php echo $_smarty_tpl->getValue('data')['username'];?>
" name="username" class="form-control">
                    <span class="text-danger"><?php echo $_smarty_tpl->getValue('data')['username_err'];?>
</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" value="<?php echo $_smarty_tpl->getValue('data')['email'];?>
" name="email" class="form-control">
                    <span class="text-danger"><?php echo $_smarty_tpl->getValue('data')['email_err'];?>
</span>
                </div> 


                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" <?php echo $_smarty_tpl->getValue('data')['password'];?>
 class="form-control">
                    <div class="text-danger"><?php echo $_smarty_tpl->getValue('data')['password_err'];?>
</div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        </div>

    </div>

  </body>
</html>
<?php }
}
