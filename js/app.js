var app = angular.module("app", [function () {
}])
    .controller("compareFiles", ["$scope", "$http",
        function ($scope, $http) {
            alert();
            $scope.aaa = "zaaa";
            $scope.formData = {};


            $scope.uploadedFile = function (element) {
                $scope.$apply(function ($scope) {
                    $scope.files = element.files;
                    console.log($scope.files);
                });
            };


            $("#compare_form").submit(function (event) {
                alert('asaaa');
                /* stop form from submitting normally */
                event.preventDefault();
                //
                // /* get the action attribute from the <form action=""> element */
                var $form = $(this),
                    url = $form.attr('action');
                //
                // /* Send the data using post with element id name and name2*/

                var data = {
                    "original_file": $('#original_file').val(),
                    "comparable_file": $('#comparable_file').val()
                };


                // $http({
                //     method: "POST",
                //     data: new FormData($form),
                //     url: url,
                //     processData: false,
                //     contentType: false,
                //     headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
                // })
                //     .then(function (data) {
                //         $scope.aaa = "tttzaaa";
                //         alert("dddrrrrrrrrrrrrr");
                //         console.log(data);
                //         console.log(JSON.parse(data));
                //         $scope.json = data;
                //
                //     });

                $.ajax({
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    url: url,
                    success: function (data) {
                        $scope.$apply(function () {
                            alert("ddd");
                            console.log(JSON.parse(data));
                            $scope.json = JSON.parse(data);
                            $scope.original_file_array = $scope.json.original_file_array;
                            $scope.comparable_file_array = $scope.json.comparable_file_array;
                            $scope.comparable_file_array_full = $scope.json.comparable_file_array_full;
                            $scope.original_file_array_full = $scope.json.original_file_array_full;
                            alert($scope.aaa);
                            console.log($scope.json);
                        });

                    }
                });
            });
        }
    ]);