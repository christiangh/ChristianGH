(function(){
    
    var app = angular.module('agency', ['opportunities-directives', 'opportunities-controllers', 'pascalprecht.translate']);
    
    app.config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    });

    app.filter('myCurrency', function() {
        return function(number, symbol, places, thousand, decimal) {
            number = number || 0;
            places = !isNaN(places = Math.abs(places)) ? places : 2;
            symbol = symbol !== undefined ? symbol : "$";
            thousand = thousand || ",";
            decimal = decimal || ".";
            var negative = number < 0 ? "-" : "",
                i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "") + " " + symbol;
        }
    });

    app.config(['$translateProvider', function ($translateProvider) {
        $translateProvider.translations('en', {
            'search': {'from': 'From', 'destination': 'Destination', 'night': 'Night', 'nights': 'Nights', 'regime': 'Regime', 'price': 'Max. price', 'titleSearcher': 'Trip searcher', 'current': 'Current search', 'to': 'to', 'with': 'with', 'results': 'Results'},
            'trips': {'book': 'Book', 'title': 'Book your trip to', 'now': 'now'}
        });
     
        $translateProvider.translations('es', {
            'search': {'from': 'Desde', 'destination': 'Destino', 'night': 'Noche', 'nights': 'Noches', 'regime': 'Régimen', 'price': 'Precio max.', 'titleSearcher': 'Buscador de viajes', 'current': 'Búsqueda actual', 'to': 'hasta', 'with': 'con', 'results': 'Resultados'},
            'trips': {'book': 'Reservar', 'title': 'Reserva tu viaje a', 'now': 'ahora'}
        });
        
        var language = document.getElementsByName("lang")[0].getAttribute("content");

        $translateProvider.preferredLanguage(language);
    }]);
    
})();