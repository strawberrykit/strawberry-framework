var app = angular.module('strawberry', ['ngSanitize']);

app.controller('mainCtrl',(
        $templateRequest,
        $sce,
        $compile,
        $scope,
        $http,
        $location
    )=>{
        $scope.profile = {
            firstName:'Kenjie'
        };
});



app.component('profileCard',{
    templateUrl: 'components/profile.htm',
    controller:($scope)=>{
        this.$onInit = function() {
            console.log('asdasd');
        };
    },
    bindings: {
        data: '@'
    }
});
