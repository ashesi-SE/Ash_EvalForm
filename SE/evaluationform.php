<!DOCTYPE html>
<html ng-app="myApp">
<head>
<title>Dynamic Fields Example</title>
<script type="text/javascript" src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-route/angular-route.js"></script>
</head>
<body>

<div ng-controller="DynamicControls">
     
        <ul>
            <li ng-repeat="x in questions">
                {{ x.type + ', ' + x.prompt }}
            </li>
        </ul>

<!-- go through each element of questions, painting appropriate control -->
         <div ng-repeat="q in questions">
            <div ng-switch="q.type">
<!-- based on type display the appropriate control-->                
                    <div ng-switch-when="comment">
                        <ng-form ng-att-name="{{q.name}}+'form'">
                        <label ng-attr-for="{{q.name}}">{{q.prompt}}</label>
                                    <table>
                                    <th colspan="3" style="text-align:left">Poor</th><th colspan="4" style="text-align:right">Excellent</th>
                                    <tr >
                                    <td ng-repeat="num in [1,2,3,4,5,6,7]">
                                    <input  type="radio"
                                           name="{{q.name}}"
                                           value="{{num}}"
                                           ng-model="q.answer"/>{{num}}
                                    </td>
                                    </tr>
                                </table>
                    </ng-form>
                    </div>
                    <div ng-switch-when="yes_no">
                        <ng-form ng-att-name="{{q.name}}+'form'">
                        <label ng-attr-for="{{q.name}}">{{q.prompt}} (check for yes)</label>
                        <input type="checkbox" name="{{q.name}}" ng-model="q.answer" ng-true-value="'Yes'" ng-false-value="'No'">
                        {{q.answer}}
                    </ng-form>
                    </div>

                    <div ng-switch-when="longcomment">
                        <ng-form ng-att-name="{{name}}+'form'">
                        <label ng-attr-for="{{name}}">{{q.prompt}}</label>
                        <textarea ng-model="q.answer"></textarea>
                    </ng-form>    
                    </div>
            </div>
        
        </div>
    </form>
 <h3>Answers</h3>
 <!-- the answers are all in the array-->
 <div ng-repeat="q in questions">
    <p>{{q.prompt}} : {{q.answer}}</p>
</div>
</div>
<script type="text/javascript">
    var app = angular.module('myApp', [ 'ngRoute']);
    app.controller('DynamicControls', ['$scope', '$http', function($scope, $http){
    /*
    questions is an array of the controls to be created.  type is which part of the ng-switch statement it uses; and name is the name of the control.  prompt is what the label should be, and answer is the default answer.   The answer property contains what the question was bound to after typing
     */

        var course_id = <?php $_REQUEST["cid"]; ?>; 
        var url = "action_page.php?cid="+course_id;
        $http.get(url).success(function(response) {$scope.questions = response;});


            
    }
    ]);


</script>
</body>
</html>