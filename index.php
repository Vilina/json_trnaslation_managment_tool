
<html ng-app="app">
<head >
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="stylesheets/css/materialize.css" media="screen,projection"/>
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <link rel="stylesheet" href="stylesheets/css/angular-json-editor.css">
    <link rel="stylesheet" href="grunt/node_modules/jsoneditor/dist/jsoneditor.min.css">
    <link rel="stylesheet" href="grunt/node_modules/angular-material/angular-material.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body >
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="grunt/node_modules/jsoneditor/dist/jsoneditor.min.js"></script>
<script type="text/javascript" src="js/angular-json-editor.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script src="grunt/node_modules/angular/angular.js"></script>
<script src="grunt/node_modules/angular-aria/angular-aria.js"></script>
<script src="grunt/node_modules/angular-animate/angular-animate.js"></script>
<script src="grunt/node_modules/angular-material/angular-material.js"></script>



<div class="row tt-main-container">
    <div class="col s12" >
        <ul class="tabs">
            <li class="tab col s2"><a class="active"  href="#test1">Compare</a></li>
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
            <div class="row">
                <div id="differences" class="col s12" >
                    <div class="col s6" >
                        {{original_file_array}}
                    </div>
                    <div class="col s6">
                        {{comparable_file_array}}
                    </div>
                </div>
                <div id="full_files" class="col s12">
                    <div class="col s6" id="originalFileEditorContainer" style=" height: 700px;">
                    </div>
                    <div class="col s6" id="comparableFileEditorContainer" style=" height: 700px;">
                    </div>
                </div>
            </div>

        </div>


        <div id="test2" class="col s12" ng-controller="createFile">

            <a class='dropdown-button btn' href='#' data-activates='languageDropdown' ng-model="languageInput">Choose Language </a>

            <!-- Dropdown Structure -->
            <md-select placeholder="Assign to user" ng-model="language" md-on-open="" style="min-width: 200px;">
                <md-option ng-value="user" ng-repeat="(language, languageObj) in availableLanguages">{{language}}</md-option>
            </md-select>
            <ul id='languageDropdown' class='dropdown-content' ng-model="language">
                <li ng-repeat="(language, languageObj) in availableLanguages"><a><input type="radio" name="languageInput" value="{{language}}">{{language}}</a></li>
            </ul>

        </div>
    </div>
</div>



</body>
</html>