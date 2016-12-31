<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Corinthian Job Manager - Login</title>
        <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap-theme.min.css" />
        <link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />    
        <script src="scripts/cormain.js" type="text/javascript"></script>
        <script src="scripts/processuserlogin.js" type="text/javascript"></script>
    </head>
    <body>
        <script>
            // display username and login prompts
            // validate entry
            // submit
            // todo: create forms for divisions table, glasstypes table, divisions table, workcenters table.
        </script>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container"><h1>Corinthian</h1>
            </div>
        </nav>
        <div class="container top-padding">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="row">
                        <div id="main-panel" class="panel panel-default">
                            <div class="panel-heading">Corinthian Login</div>
                            <div class="form-group panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="corusername" id="corusername" class="form-control" title="Enter User Name" placeholder="Username" tabindex="1" autofocus onchange="validateUserLogin()"/>
                                </div>
                                <br />                                    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-sunglasses"></i></span>
                                    <input type="password" name="coruserpass" id="coruserpass" class="form-control"  title="Enter Password" placeholder="Password" tabindex="2" />
                                </div>
                                <br />
                                <input type="button" name="corsubmit" id="corsubmit" class="form-control btn btn-default pull-right" value="Login" onclick="processUserLogin()" />
                            </div> 
                            <div id="statusbar" class="statusbar">Status: </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>                
        </div>

    </body>
</html>
