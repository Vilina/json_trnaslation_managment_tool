<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="stylesheets/css/materialize.css" media="screen,projection"/>
    <link rel="stylesheet" href="stylesheets/css/app.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/app.js"></script>


<div class="row tt-main-container">
    <div class="col s12" >

        <ul class="tabs">
            <li class="tab col s2"><a class="active" href="#test1">Compare</a></li>
            <li class="tab col s2"><a href="#test2">Create</a></li>
        </ul>
        <div id="test1" class="col s12">
            <?php
            $jsonPATH1 = 'D:\fantasy\UnitedStatesOfFantasy\FSSportsWEBSite\global\data\Languages\languages_eng.json';
            $json1 = file_get_contents($jsonPATH1);
            $jsonPATH2 = 'D:\fantasy\UnitedStatesOfFantasy\FSSportsWEBSite\global\data\Languages\languages_spa.json';
            $json2 = file_get_contents($jsonPATH2);
            $array1 = json_decode($json1, true);
            $array2 = json_decode($json2, true);

//            echo '<pre>';


            //var_dump($array2);
            foreach ($array1 as $key1 => &$value1) {
//    var_dump("dddddddddd".$key1);
//    var_dump(isset($array2["$key1"]));
//    var_dump(isset($array2["5050"]));
                if (isset($array2[$key1])) {
                    unset($array1[$key1]);
                    unset($array2[$key1]);
                } else {
//                    echo 'ffff ';
//                    echo $key1;
                }
            }

//            var_dump($array1);
//            echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
//            var_dump($array2);
            //    var_dump($array1);
            //    var_dump($array2);
            ?>
            <form id="compare_form" action="compare.php" method="post">
                <div class="col s6 ">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="original_file" placeholder="Upload original file">
                        </div>
                    </div>

                </div>
                <div class="col s6">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="comparable_file" placeholder="Upload file you want to compare with the original">
                        </div>
                    </div>
                </div>
                <div class="col s2 offset-s10">
                    <button class="btn waves-effect waves-light tt-float-right" type="submit" name="action">compare</button>
                </div>
            </form>

        </div>
        <div id="test2" class="col s12">Test 2</div>
    </div>
</div>



</body>