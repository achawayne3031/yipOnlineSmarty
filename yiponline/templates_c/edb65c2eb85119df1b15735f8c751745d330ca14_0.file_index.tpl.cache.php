<?php
/* Smarty version 5.4.0, created on 2024-08-27 22:02:59
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66ce30f3f38133_03588960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edb65c2eb85119df1b15735f8c751745d330ca14' => 
    array (
      0 => 'index.tpl',
      1 => 1724788976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66ce30f3f38133_03588960 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\yipOnlineSmarty\\yiponline\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '194100505466ce30f3e70f97_71870798';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>


    <div class="container">
        <div class="row">
        <div class="col-md-4 col-12"></div>

        <div class="col-md-4 col-12 mt-4">

     

            <h3 class="text-center">Register <?php echo $_smarty_tpl->getValue('pp');?>
</h3>

            <?php echo json_encode($_smarty_tpl->getValue('form_data'));?>


            <form method="POST" action="<?php echo $_smarty_tpl->getValue('URLROOT');?>
/index.php">

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" value="<?php echo $_smarty_tpl->getValue('form_data')['username'];?>
" name="username" class="form-control">
                    <span class="invalid-feedback"><?php echo $_smarty_tpl->getValue('form_data')['username_err'];?>
 test ing</span>
                    <span><?php echo $_smarty_tpl->getValue('status');?>
</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" value="<?php ob_start();
echo $_smarty_tpl->getValue('form_data')['email'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" name="email" class="form-control">
                    <span class="invalid-feedback"><?php echo $_smarty_tpl->getValue('form_data')['username_err'];?>
 test ing</span>
                </div> 


                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" <?php echo $_smarty_tpl->getValue('form_data')['password'];?>
 class="form-control">
                    <span class="invalid-feedback"><?php echo $_smarty_tpl->getValue('form_data')['username_err'];?>
 test ing</span>

                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        </div>

    </div>

    <?php echo '<script'; ?>
 src="index.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
