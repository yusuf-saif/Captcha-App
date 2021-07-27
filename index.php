<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <title>Recaptcha App</title>
</head>
<body>
      <div class="container">
            <h3>Simple Recaptcha app</h3>
                  <div class="row">
                        <div class="col-md-6"> 
                              <div class="col-md-12">
                                    <form name="form" class="form" action="" method="post">
                                          <div class="form-group">
                                          <label for="captcha" class="text-info">
						      <?php if($message) { ?>
							<span class="text-warning"><strong><?php echo $message; ?></strong></span>
                                          <?php } ?>
                                          </label>
                                          <input type="text" name="securityCode" id="securityCode" class="form-control" placeholder="Enter the security code">
                                          <div class="form-group">
                                          <img src="get_captcha.php?rand=<?php echo rand(); ?>" id='captcha'> <br>
                                         <!-- <p><br>Need another style click me <a href="javascript:void(0)" id="reloadCaptcha"> Click Me </a> </p>-->
                                         <div class="form-group">	
						      <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">								
					            </div>		
                                          </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
      </div>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>