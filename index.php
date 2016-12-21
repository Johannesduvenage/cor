<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap-theme.min.css" />
    <link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <title>Corinthian Job Manager - Login</title>
  </head>
  <body>
    <script>
      // display username and login prompts
      // validate entry
      // submit
      // todo: create forms for divisions table, glasstypes table, divisions table, workcenters table.
    </script>

    <div class="container top-padding">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading">Corinthian Login</div>
              <div class="form-group panel-body">
                <form name="coruserlogin" id="coruserlogin" action="scripts/processuserlogin.php">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="corusername" id="corusername" class="form-control" title="Enter User Name" />
                  </div>
                  <br />                                    
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-sunglasses"></i></span>
                    <input type="password" name="coruserpass" id="coruserpass" class="form-control"  title="Enter Password" />
                  </div>
                  <br />                                    
                  <input type="submit" name="corsubmit" id="corsubmit"  class="form-control btn btn-default pull-right" value="Login" />
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4"></div>                
      </div>
    </div>
  </body>
</html>
