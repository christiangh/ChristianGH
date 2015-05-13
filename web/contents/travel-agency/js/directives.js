(function() {
  var app = angular.module('opportunities-directives', []);

  app.directive('opportunitiesListing', function(){
    return{
        restrict: 'A',
        templateUrl: '/contents/travel-agency/templates/opportunities-listing.html.twig'
        }
    });

    app.directive('opportunitiesSearcher', function(){
        return{
            restrict: 'E',
            templateUrl: '/contents/travel-agency/templates/opportunities-searcher.html.twig',
            controller: 'SearcherController',
            controllerAs: 'searcherCtrl"'
        }
    });
})();