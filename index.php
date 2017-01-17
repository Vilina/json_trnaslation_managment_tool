<html ng-app="app">
<head >
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="stylesheets/css/materialize.css" media="screen,projection"/>
    <link rel="stylesheet" href="stylesheets/css/app.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body >
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/app.js"></script>


<div class="row tt-main-container">
    <div class="col s12" >

        <ul class="tabs">
            <li class="tab col s2"><a class="active" href="#test1">Compare</a></li>
            <li class="tab col s2"><a href="#test2">Create</a></li>
        </ul>
        <div id="test1" class="col s12" ng-controller="compareFiles">
            <form id="compare_form" action="compare.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s5 ">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="original_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"  placeholder="Upload original file">
                            </div>
                        </div>

                    </div>
                    <div class="col s5">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="comparable_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"  placeholder="Upload file you want to compare with the original">
                            </div>
                        </div>
                    </div>
                    <div class="col s2 valign-wrapper compare-button">
                        <button class="btn  valign waves-effect waves-light tt-float-right" type="submit" name="action">compare</button>
                    </div>
                </div>
            </form>

            <ul class="tabs">
                <li class="tab col s2"><a class="active" href="#differences">Differences</a></li>
                <li class="tab col s2"><a href="#full_files">Full files</a></li>
            </ul>
            <div id="differences" class="col s10" >
                <div class="col s6">
                    {{original_file_array}}
                </div>
                <div class="col s6">
                    {{comparable_file_array}}
                </div>
            </div>
            <div id="full_files" class="col s10">
                <div class="col s6">
                    {{original_file_array_full}}
                </div>
                <div class="col s6">
                    {{comparable_file_array_full}}
                </div>
            </div>
        </div>


        <div id="test2" class="col s12">Test 2</div>
    </div>
</div>



</body>
</html>