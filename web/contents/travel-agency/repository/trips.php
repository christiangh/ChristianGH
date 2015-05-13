<?php
    $response = array();

    $postdata = file_get_contents("php://input");
    $filters = json_decode($postdata);

    /** DATA **/
    $trips = array();

    $regimes = array("es" => array(1 => "Solo habitación", 2 => "Media pensión", 3 => "Pensión completa"),
                     "en" => array(1 => "Room only", 2 => "Half broad", 3 => "Full board")
                     );

    $trips[] = array("destination" => array("id" => 1, "name_es" => "Dublín", "name_en" => "Dublin"), "img" => "/contents/travel-agency/images/dublin.jpg", "nights" => 1, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 55);
    $trips[] = array("destination" => array("id" => 6, "name_es" => "Barcelona", "name_en" => "Barcelona"), "img" => "/contents/travel-agency/images/barcelona.jpg", "nights" => 5, "regime" => array("id" => 3, "name" => $regimes[$filters->language][3]), "price" => 850);
    $trips[] = array("destination" => array("id" => 7, "name_es" => "Atenas", "name_en" => "Athens"), "img" => "/contents/travel-agency/images/atenas.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 580);
    $trips[] = array("destination" => array("id" => 5, "name_es" => "Valencia", "name_en" => "Valencia"), "img" => "/contents/travel-agency/images/valencia.jpg", "nights" => 2, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 375);
    $trips[] = array("destination" => array("id" => 9, "name_es" => "Londres", "name_en" => "London"), "img" => "/contents/travel-agency/images/london.jpg", "nights" => 3, "regime" => array("id" => 2, "name" => $regimes[$filters->language][2]), "price" => 660);
    $trips[] = array("destination" => array("id" => 8, "name_es" => "Roma", "name_en" => "Rome"), "img" => "/contents/travel-agency/images/roma.jpg", "nights" => 5, "regime" => array("id" => 3, "name" => $regimes[$filters->language][3]), "price" => 940);
    $trips[] = array("destination" => array("id" => 10, "name_es" => "Caribe", "name_en" => "Caribbean"), "img" => "/contents/travel-agency/images/caribe.jpg", "nights" => 7, "regime" => array("id" => 3, "name" => $regimes[$filters->language][3]), "price" => 1200);
    $trips[] = array("destination" => array("id" => 11, "name_es" => "París", "name_en" => "Paris"), "img" => "/contents/travel-agency/images/paris.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 590);
    $trips[] = array("destination" => array("id" => 12, "name_es" => "Florencia", "name_en" => "Florence"), "img" => "/contents/travel-agency/images/florencia-2.jpg", "nights" => 4, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 600);
    $trips[] = array("destination" => array("id" => 13, "name_es" => "Nueva York", "name_en" => "New York"), "img" => "/contents/travel-agency/images/new-york.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 1200);
    $trips[] = array("destination" => array("id" => 8, "name_es" => "Roma", "name_en" => "Rome"), "img" => "/contents/travel-agency/images/roma-2.jpg", "nights" => 3, "regime" => array("id" => 2, "name" => $regimes[$filters->language][2]), "price" => 720);
    $trips[] = array("destination" => array("id" => 14, "name_es" => "Tokio", "name_en" => "Tokyo"), "img" => "/contents/travel-agency/images/tokyo.jpg", "nights" => 5, "regime" => array("id" => 2, "name" => $regimes[$filters->language][2]), "price" => 1130);
    $trips[] = array("destination" => array("id" => 15, "name_es" => "S. Petersburgo", "name_en" => "St. Petersburg"), "img" => "/contents/travel-agency/images/st-petersburg.jpg", "nights" => 5, "regime" => array("id" => 3, "name" => $regimes[$filters->language][3]), "price" => 1040);
    $trips[] = array("destination" => array("id" => 16, "name_es" => "Guiza", "name_en" => "Giza"), "img" => "/contents/travel-agency/images/guiza.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 750);
    $trips[] = array("destination" => array("id" => 6, "name_es" => "Barcelona", "name_en" => "Barcelona"), "img" => "/contents/travel-agency/images/barcelona-2.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 600);
    $trips[] = array("destination" => array("id" => 17, "name_es" => "Moscú", "name_en" => "Moscou"), "img" => "/contents/travel-agency/images/moscu.jpg", "nights" => 4, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 570);
    $trips[] = array("destination" => array("id" => 12, "name_es" => "Florencia", "name_en" => "Florence"), "img" => "/contents/travel-agency/images/florencia.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 600);
    $trips[] = array("destination" => array("id" => 18, "name_es" => "Perito Moreno", "name_en" => "Perito Moreno"), "img" => "/contents/travel-agency/images/perito-moreno.jpg", "nights" => 13, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 2420);
    $trips[] = array("destination" => array("id" => 11, "name_es" => "París", "name_en" => "Paris"), "img" => "/contents/travel-agency/images/paris-2.jpg", "nights" => 2, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 320);
    $trips[] = array("destination" => array("id" => 7, "name_es" => "Atenas", "name_en" => "Athens"), "img" => "/contents/travel-agency/images/atenas-2.jpg", "nights" => 3, "regime" => array("id" => 1, "name" => $regimes[$filters->language][1]), "price" => 600);
    $trips[] = array("destination" => array("id" => 13, "name_es" => "Nueva York", "name_en" => "New York"), "img" => "/contents/travel-agency/images/new-york-2.jpg", "nights" => 10, "regime" => array("id" => 2, "name" => $regimes[$filters->language][2]), "price" => 2680);
    /** DATA **/
    
    $trip_results = array();
    
    /** FILTERS **/
    foreach($trips as $trip){
        $valid = true;

        //FROM
        if( $trip['destination']['id'] == $filters->from->id ){
            $valid = false;
        }

        //DESTINATION
        if( $filters->destination->id != 0 && $trip['destination']['id'] != $filters->destination->id ){
            $valid = false;
        }

        //NIGHTS
        if( $filters->nights->id != 0 && $trip['nights'] != $filters->nights->id && ($filters->nights->id != 8 || $trip['nights'] < 8) ){
            $valid = false;
        }

        //REGIME
        if( $filters->regime->id != 0 && $trip['regime']['id'] != $filters->regime->id ){
            $valid = false;
        }

        //PRICE
        if( $filters->price->id != 0 && $trip['price'] > $filters->price->value && ($filters->price->id != 5 || $trip['price'] <= 750 ) ){
            $valid = false;
        }
        

        //INSERTING DESTINATION
        if($valid){
            if($filters->language === "es"){
                $trip['destination']['name'] = $trip['destination']['name_es'];
                unset($trip['destination']['name_en']);
            }else{
                $trip['destination']['name'] = $trip['destination']['name_en'];
                unset($trip['destination']['name_es']);
            }
            $trip_results[] = $trip;
        }
    }
    /** FILTERS **/
    
    /** SORT **/
    
    /** SORT **/
    
    /** PAG RESULTS **/
    $results_per_page = 6;
    $pag = (isset($filters->page) && !empty($filters->page))? $filters->page : 1;
    $ini_results = ($pag-1)*$results_per_page;
    $response['results'] = count($trip_results);
    $response['page'] = $pag;
    $response['lastPage'] = ($response['results']%$results_per_page == 0)? floor($response['results']/$results_per_page) : floor($response['results']/$results_per_page)+1;
    $response['trips'] = array_slice($trip_results, $ini_results, $results_per_page);
    /** PAG RESULTS **/
    
    echo json_encode($response);

?>