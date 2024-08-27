<!DOCTYPE html>
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
            {if $message != ""}
                {if $status}
                  <div class="alert alert-success">
                    <strong>Success!</strong> {$message}
                  </div>
                {/if}

                {if !$status}
                  <div  class="alert alert-danger">
                    <strong>Warning!</strong> {$message}
                  </div>
                {/if}
            {/if}

            <form method="POST" action="index.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" value="{$data['username']}" name="username" class="form-control">
                    <span class="text-danger">{$data['username_err']}</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" value="{$data['email']}" name="email" class="form-control">
                    <span class="text-danger">{$data['email_err']}</span>
                </div> 


                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" {$data['password']} class="form-control">
                    <div class="text-danger">{$data['password_err']}</div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        </div>

    </div>

  </body>
</html>
