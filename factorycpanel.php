<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Factory User Control Panel</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/cormain.css" />
        <script language="JavaScript" src="scripts/cormain.js" type="text/javascript"></script>
    </head>

    <body onload="corsetdate();">
        <div class="shadow">
            <form action="" class="corprintjobcard" method="post" enctype="multipart/form-data" name="jobcard">
                <h1>JOB CARD</h1>
                <ul class="corentry">
                    <li><label for="cordate">Date: </label><input id="cordate" name="cordate" type="text" size="20" maxlength="10" tabindex="1" /></li>
                    <li><label for="corname">Name: </label><input id="corname" name="corname" type="text" size="19" maxlength="50" tabindex="2" /></li>
                    <li><label for="corotime12">O/time 1&frac12;</label><input id="corotime12" name="corname" type="text" size="16" maxlength="10" tabindex="3" /></li>
                    <li><label for="corotime2">O/time 2</label><input id="corotime12" name="corname" type="text" size="18" maxlength="10" tabindex="4" /></li>
                </ul>
                <div class="corentryheadercontainer">
                    <ul class="corentryheader">
                        <li style="border-left:none;">QTY</li>
                        <li>WORK DONE</li>
                        <li>TIME SPENT</li>
                        <li>CLOCK RECORD</li>
                    </ul>
                </div>
            </form>
        </div>
    </body>
</html>
