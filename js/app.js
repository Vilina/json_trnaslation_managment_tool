var app = angular.module("app", [function () {
}])
    .controller("compareFiles", ["$scope", "$http",
        function ($scope, $http) {
            $scope.aaa = "zaaa";
            $scope.formData = {};


            $scope.uploadedFile = function (element) {
                $scope.$apply(function ($scope) {
                    $scope.files = element.files;
                    console.log($scope.files);
                });
            };

            $scope.options={
                "mode": "code",
                "modes": [
                    "tree",
                    "form",
                    "code",
                    "text"
                ],
                "history": false
            };

            $("#compare_form").submit(function (event) {
                /* stop form from submitting normally */
                $scope.formData1 = new FormData();
                event.preventDefault();
                angular.forEach( $("#compare_form input[type=file]"), function(value, key){
                    var file = value.files[0];
                    var file_name = value.name;
                    $scope.formData1.append(file_name, file);
                });
                var $form = $(this);
                var url = $form.attr('action');

                $http({
                    method: "POST",
                    data: $scope.formData1,
                    url: url,
                    processData: false,
                    contentType: false,
                    headers : { 'Content-Type': undefined }
                })
                    .then(function (response) {
                        $scope.aaa = "tttzaaa";
                        console.log(response);
                        // console.log(JSON.parse(data));
                        $scope.dataObject = response.data;
                        $scope.original_file_array = $scope.dataObject.original_file_array;
                        $scope.comparable_file_array = $scope.dataObject.comparable_file_array;
                        $scope.comparable_file_array_full = $scope.dataObject.comparable_file_array_full;
                        $scope.original_file_array_full = $scope.dataObject.original_file_array_full;

                        var originalFileContainer = document.getElementById("originalFileEditorContainer");
                        var originalFileEditor = new JSONEditor(originalFileContainer,  $scope.options);
                        originalFileEditor.set($scope.original_file_array_full);


                        var comparableFileContainer = document.getElementById("comparableFileEditorContainer");
                        var comparableFileEditor = new JSONEditor(comparableFileContainer,  $scope.options);
                        comparableFileEditor.set($scope.comparable_file_array_full);


                        $("#originalFileEditorContainer").on("scroll", function () {
                            $("#comparableFileEditorContainer").scrollTop($("#originalFileEditorContainer").scrollTop());
                            $("#comparableFileEditorContainer").scrollLeft($("#originalFileEditorContainer").scrollLeft());
                        });
                        $("#comparableFileEditorContainer").on("scroll", function () {
                            $("#originalFileEditorContainer").scrollTop($("#comparableFileEditorContainer").scrollTop());
                            $("#originalFileEditorContainer").scrollLeft($("#comparableFileEditorContainer").scrollLeft());
                        });
                    });
    
              

                // $.ajax({
                //     type: "POST",
                //     data: new FormData(this),
                //     processData: false,
                //     contentType: false,
                //     url: url,
                //     success: function (data) {
                //         $scope.$apply(function () {
                //             alert("ddd");
                //             console.log(JSON.parse(data));
                //             $scope.json = JSON.parse(data);
                //
                //             alert($scope.aaa);
                //             console.log($scope.json);
                //         });
                //
                //     }
                // });
            });
        }
    ])

.controller("createFile", ["$scope", "$http",
    function ($scope, $http) {

        $scope.availableLanguages = {
            English: {
                shortName: 'eng'
            },
            Español:{
                shortName: 'spa'
            },
            Русский:{
                shortName: 'rus'
            },
            Հայերեն:{
                shortName: 'arm'
            },
            Português:{
                shortName: 'por'
            },
            PortuguêsDoBrasil:{
                shortName: 'pt-br'
            },
            Türkçe:{
                shortName: 'tur'
            },
            한국어:{
                shortName: 'kor'
            },
            日本語:{
                shortName: 'jpn'
            },
            繁體中文:{
                shortName: 'zho'
            },
            简体中文:{
                shortName: 'chi'
            },
            ქართული:{
                shortName: 'geo'
            },
            Swedish:{
                shortName: 'swe'
            },
            Deutsch:{
                shortName: 'ger'
            },
            Norwegian:{
                shortName: 'pt-br'
            },
            العربي:{
                shortName: 'srb'},
            Farsi:{
                shortName: 'pt-br'
            }
        };

        $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                constrainWidth: false, // Does not change width of dropdown to that of the activator
                hover: true, // Activate on hover
                gutter: 0, // Spacing from edge
                belowOrigin: true, // Displays dropdown below the button
                alignment: 'left', // Displays dropdown with edge aligned to the left of button
                stopPropagation: false // Stops event propagation
            }
        );

    }]);