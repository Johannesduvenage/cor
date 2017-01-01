<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Factory User Control Panel</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/cormain.css" />
        <script language="JavaScript" src="scripts/cormain.js" type="text/javascript"></script>
        <style>
            .corentryheader {
                float:left;
                padding:.5em;
                padding-left:0;
                margin:0;
                white-space:nowrap;
                list-style-type:none;
                font-size:10px;
            }
            .corentryheader li {
                display:inline;
                height:8mm;
                border:1px solid #000;
                padding:0 1em 0 1em;
            }
            ul.corentry {
                list-style-type:none;
            }
            .corprintjobcard {
                height:185mm;
                width:103mm;
                padding:0;
                background-color:#ff6;
                border-color:#000;
                font-size:10px;
                outline-style:none;
            }

            .corprintjobcard h1 {
                padding-top:8mm;
                padding-left:3mm;
                font-size:30px;
            }

            .corprintjobcard input {
                background:none;
                border: none;
                border-bottom: 2px dotted #000;
            }

            .cordisplayjobcard {
                height:6em;
                width:3em;
            }
            .corentryheadercontainer {
                /*border-width:1px 1px 1px 1px;
                border-color:#000;
                border-style:solid;*/
                height:8mm;
                padding:0;
                margin:0;
            }
            .corprintjobcard, .shadow {
                position:relative;
                bottom:4px;
                right:4px;
            }
            .shadow { width:103mm;background-color: #ccc; }

        </style>

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
