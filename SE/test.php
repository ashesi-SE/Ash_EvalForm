<?php 
    $cid = $_REQUEST["cid"];
?>

<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Evaluation Form</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bower_components/angularjs/angular.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
</head>
<body>
    <div id="wrapper" >
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Virtual Evaluation Form </a>
            </div>
        </nav>

            <div id="page-wrapper" >
                <!-- <div class="container-fluid" ng-controller="'MetaData">
                    <ul ng-repeat="x in teams.teams">
                        <li>
                            {[x.name]}
                        </li>
                    </ul>
                </div> -->
                <div class="container-fluid" ng-controller="DynamicControls">
                    <!-- go through each element of questions, painting appropriate control --> 
                    <h2>Course Evaluation Form</h2>
                    <div ng-repeat="q in questions.questions" class="col-lg-8">

                        <div ng-switch="q.type" >
                            <!-- based on type display the appropriate control-->                
                            <div ng-switch-when="rating">
                                <ng-form ng-att-name="{{q.name}}+'form'">
                                <label ng-attr-for="{{q.name}}">{{q.prompt}}</label>
                                <table>
                                    <th colspan="3" style="text-align:left">Poor</th><th colspan="4" style="text-align:right">Excellent</th>
                                    <tr >
                                        <td ng-repeat="num in [1,2,3,4,5]">
                                            <input  type="radio"
                                            name="{{q.name}}"
                                            value="{{num}}"
                                            ng-model="q.answer"/>{{num}}
                                        </td>
                                    </tr>
                                </table>
                                </ng-form>
                                <hr>
                            </div>
                            <div ng-switch-when="ratingcomment">
                                <ng-form ng-att-name="{{q.name}}+'form'">
                                <label ng-attr-for="{{q.name}}">{{q.prompt}}</label>
                                <table>
                                    <th colspan="3" style="text-align:left">Poor</th><th colspan="4" style="text-align:right">Excellent</th>
                                    <tr >
                                        <td ng-repeat="num in [1,2,3,4,5]">
                                            <div class="radio">
                                            <input  type="radio"
                                            name="{{q.name}}"
                                            value="{{num}}"
                                            ng-model="q.answer"/>
                                            </div>{{num}}
                                        </td>
                                        <td>
                                            <label ng-attr-for="{{name}}">{{q.prompt}}</label>
                                            <input ng-model="q.answer">
                                        </td>
                                    </tr>
                                </table>
                                
                                </ng-form>
                                <hr>
                            </div>
                            <div ng-switch-when="yes_no">
                                <ng-form ng-att-name="{{q.name}}+'form'">
                                    <label ng-attr-for="{{q.name}}">{{q.prompt}} (check for yes)</label>
                                    <input type="checkbox" name="{{q.name}}" ng-model="q.answer" ng-true-value="'Yes'" ng-false-value="'No'">
                                    {{q.answer}}
                                </ng-form>
                                <hr>
                            </div>

                            <div ng-switch-when="comment">
                                <ng-form ng-att-name="{{name}}+'form'">
                                    <label ng-attr-for="{{name}}">{{q.prompt}}</label>
                                    <input  class="form-control" ng-model="q.answer">
                                </ng-form> 
                                <hr>   
                            </div>
                        </div>
                    </div>
                    <h3>Your Evaluation:</h3>
                    <!-- the answers are all in the array-->
                    <div ng-repeat="q in questions">
                        <p>{{q.prompt}} : {{q.answer}}</p>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-success" >Save Evaluation</button>
                                <!-- <button type="reset" class="btn btn-warning">Reset</button> -->
                    </div>

                </div>
            </div>
    </div>


<!-- jQuery -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">


var app = angular.module('myApp',[ 'ngRoute']);

app.controller('DynamicControls',['$scope', '$http', function($scope, info){
    // var course_id = <?php echo $cid; ?>;
    // var url = "action_page.php?cid="+course_id;

    // $http.get(url).success(function(response){$scope.questions = response;});

    $scope.questions = info.getQuestions();
    $scope.teams = info.getTeams();

    // var url2 = "action_page.php?courseid="+cid;
    // $http.get(url2).success(function(result){$scope.teams} = result;});
        // $scope.questions=[
        //     {type:"eval",name:"professional",prompt:"The presenters were professional",answer:"5"},
        //     {type:"eval",name:"expectations",prompt:"The presentation met expectations",answer:"5"},
        //     {type:"yesno",name:"continue",prompt:"They should continue",answer:"No"},
        //     {type:"longcomment",name:"advice",prompt:"Words of Advice",answer:""}
        // ];
        // $scope.questions=[
        //     {"type":"comment","prompt":"How are you?"},
        //     {"type":"rating","prompt":"How good were they?"},
        //     {"type":"yes_no","prompt":"Did they present?"}
        // ];
    }
    ]);
app.factory('info', function($http, $q){
    var course_id = <?php echo $cid; ?>;

    return{
        getQuestions: function(){
            var promises = [];
            var url = "action_page.php?cid="+course_id;
            promises.push($http.get(url).success(function(response){$scope.questions = response;}));

            return $q.all(promises);

        },
        getTeams: function(){
            var promises = [];
            var url = "action_page.php?courseid="+course_id;
            promises.push($http.get(url).success(function(response){$scope.teams = response;}));
        
            return $q.all(promises);
        }
})


//angular.module('myApp', [ 'ngRoute']).controller('DynamicControls', ['$scope', function($scope){
/*
questions is an array of the controls to be created.  type is which part of the ng-switch statement it uses; and name is the name of the control.  prompt is what the label should be, and answer is the default answer.   The answer property contains what the question was bound to after typing
*/

</script>
</body>
</html>