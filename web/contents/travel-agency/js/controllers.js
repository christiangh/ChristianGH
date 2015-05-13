(function(){
    
    var app = angular.module('opportunities-controllers', []);

    app.controller('OpportunitiesController', function($scope, $http, $translate){
        $scope.trips = [];
        $scope.current_language = $translate.use();

        if($scope.current_language === 'es'){
            $scope.fromCities = [{'id':1, 'name':'Dublín'}, {'id':2, 'name':'Galway'}, {'id':3, 'name':'Cork'}];
        }else{
            $scope.fromCities = [{'id':1, 'name':'Dublin'}, {'id':2, 'name':'Galway'}, {'id':3, 'name':'Cork'}];
        }
        
        $scope.destinations = [];
        $http.post('/contents/travel-agency/repository/destinations.php')
        .success(function(data){
            $scope.destinations = [{'id':0, name:'Todos'}].concat(data);
            $scope.search.destination = $scope.destinations[0];

            //We get the default trips after updating destination
            $scope.getTrips();
        })
        .error(function(err){
            console.log(err);
        });
        if($scope.current_language === 'es'){
            $scope.nights = [{'id':0, 'name':'Cualquiera'}, {'id':1 , 'name':'1'},  {'id':2 , 'name':'2'},  {'id':3 , 'name':'3'},  {'id':4 , 'name':'4'},  {'id':5 , 'name':'5'},  {'id':6 , 'name':'6'},  {'id':7 , 'name':'7'},  {'id':8 , 'name':'7+'}];
        }else{
            $scope.nights = [{'id':0, 'name':'Any'}, {'id':1 , 'name':'1'},  {'id':2 , 'name':'2'},  {'id':3 , 'name':'3'},  {'id':4 , 'name':'4'},  {'id':5 , 'name':'5'},  {'id':6 , 'name':'6'},  {'id':7 , 'name':'7'},  {'id':8 , 'name':'7+'}];
        }

        if($scope.current_language === 'es'){
            $scope.regimes = [{'id':0, 'name':'Cualquiera'},{'id':1, 'name':'Solo habitación'}, {'id':2, 'name':'Media pensión'}, {'id':3, 'name':'Pensión completa'}];
        }else{
            $scope.regimes = [{'id':0, 'name':'Any'},{'id':1, 'name':'Room only'}, {'id':2, 'name':'Half board'}, {'id':3, 'name':'Full board'}];
        }
        
        if($scope.current_language === 'es'){
            $scope.prices = [{'id':0, 'value': '0', 'name':'Cualquiera'}, {'id':1, 'value': '100', 'name':'100 €'}, {'id':2, 'value': '250', 'name':'250 €'}, {'id':3, 'value': '500', 'name':'500 €'}, {'id':4, 'value': '750', 'name':'750 €'}, {'id':5, 'value': '0', 'name':'+750 €'}];
        }else{
            $scope.prices = [{'id':0, 'value': '0', 'name':'Any'}, {'id':1, 'value': '100', 'name':'100 €'}, {'id':2, 'value': '250', 'name':'250 €'}, {'id':3, 'value': '500', 'name':'500 €'}, {'id':4, 'value': '750', 'name':'750 €'}, {'id':5, 'value': '0', 'name':'+750 €'}];
        }

        $scope.search = {'from': $scope.fromCities[0], 'destination': $scope.destinations[0], 'nights': $scope.nights[0], 'regime': $scope.regimes[0], 'price': $scope.prices[0], 'page': 1, 'language': $scope.current_language}
        $scope.lastPage = 1;
        $scope.results = 0;
        $scope.listingClass = "";

        $scope.getTrips = function(){
            $scope.trips = [];
            
            $http.post('/contents/travel-agency/repository/trips.php', $scope.search)
            .success(function(data){
                $scope.trips = data.trips;
                $scope.lastPage = data.lastPage;
                $scope.tripResults = data.results;
                $scope.listingClass = "";
            })
            .error(function(err){
                console.log(err);
                $scope.listingClass = "";
            });
        }

        $scope.nextPage = function(){
            if($scope.search.page < $scope.lastPage){
                $scope.listingClass = "out_left";
                $scope.search.page++;
                setTimeout(function(){
                    $scope.$apply(function(){
                        $scope.listingClass = "in_right";
                        setTimeout(function(){
                            $scope.$apply(function(){
                                $scope.getTrips();
                            });
                        }, 100);
                    });
                }, 500);
            }
        }

        $scope.previousPage = function(){
            if($scope.search.page > 1){
                $scope.listingClass = "out_right";
                $scope.search.page--;
                setTimeout(function(){
                    $scope.$apply(function(){
                        $scope.listingClass = "in_left";
                        setTimeout(function(){
                            $scope.$apply(function(){
                                $scope.getTrips();
                            });
                        }, 100);
                    });
                }, 500);
            }
        }
    });

    app.controller('SearcherController', function($scope){
        $scope.showingSearcher = true;

        $scope.toggleSearcher = function(){
            if($scope.showingSearcher === true){
                $scope.showingSearcher = false;
            }else{
                $scope.showingSearcher = true;
            }
        }
    });
    
})();