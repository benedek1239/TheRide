document.getElementById('user-email-icon').addEventListener('click', ()=>{
    if(document.getElementById('user-email').classList.contains('hide')){
        document.getElementById('user-email').classList.remove('hide');
    }
    else{
        document.getElementById('user-email').classList.add('hide');
    }
});

function initMap() {
    //Create a new google map
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        disableDefaultUI: true,
        styles: [
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "lightness": 100
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#C6E2FF"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#C5E3BF"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#D1D1B8"
                    }
                ]
            }
        ]
    });
    //Create new direction service
    var directionsService = new google.maps.DirectionsService;
    var distance = 0;
    var time = 0;
    
    function renderDirections(result) {
        var directionsRenderer = new google.maps.DirectionsRenderer;
        directionsRenderer.setMap(map);
        directionsRenderer.setDirections(result);

        for(j=0; j<result.routes[0].legs.length; ++j){
            distance += result.routes[0].legs[j].distance.value;
            time += result.routes[0].legs[j].duration.value;
        }
        distance = parseFloat(parseInt(distance / 100)/10);
        time = parseInt(time / 60);
        document.getElementById('distance-shower').innerHTML = distance.toFixed(1);
        if(time > 60){
            if(parseInt(time/60) > 1){
                document.getElementById('time-shower').innerHTML =  parseInt(time/60) + ' ' + document.getElementById('hidden-div-hours').innerHTML + ' ' + time%60;
            }
            else{
                document.getElementById('time-shower').innerHTML =  parseInt(time/60) + ' ' + document.getElementById('hidden-div-hour').innerHTML + ' ' + time%60;
            }
        }
        else{
            document.getElementById('time-shower').innerHTML = time;
        }
    }

    var waypoints = document.getElementById("waypoints");
    var innerWaypoints = waypoints.getElementsByTagName("INPUT");

    //Have multiple waypoint
    if(innerWaypoints.length > 2){
        splittedStart = document.getElementById("waypoint1").value.split(" ");
        splittedEnd = document.getElementById(`waypoint${innerWaypoints.length}`).value.split(" ");
        
        startltdlng = new google.maps.LatLng(splittedStart[0], splittedStart[1]); 
        endltdlng = new google.maps.LatLng(splittedEnd[0], splittedEnd[1]); 

        var waypts = [];
        //Go through all the waypoint inputs and get the coordinates
        for(var i=2; i<innerWaypoints.length; ++i){
            splittedMiddle = document.getElementById(`waypoint${i}`).value.split(" ");
            stopp = new google.maps.LatLng(splittedMiddle[0], splittedMiddle[1]);
            waypts.push({
                location: stopp,
                stopover: true
            });
        }
        
        directionsService.route({
        origin: startltdlng,
        destination: endltdlng,
        waypoints: waypts,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
        }, function(result) {
            renderDirections(result);
        });

    }
    //No inner waypoints
    else{
        splittedStart = document.getElementById("waypoint1").value.split(" ");
        splittedEnd = document.getElementById("waypoint2").value.split(" ");

        startltdlng = new google.maps.LatLng(splittedStart[0], splittedStart[1]); 
        endltdlng = new google.maps.LatLng(splittedEnd[0], splittedEnd[1]); 

        directionsService.route({
        origin: startltdlng,
        destination: endltdlng,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
        }, function(result) {
            renderDirections(result);
        });
    }

}
document.getElementById('places_number').value = 1;
document.getElementById(`get-ride-places-icon-0`).classList.add('mained-clicked');
placesNumber = document.getElementById('number-of-available-places').value;

for(i=0; i<placesNumber; ++i){
    switch(i){
        case 1:
            document.getElementById(`get-ride-places-icon-1`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-1`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
            });
            break;
        case 2:
            document.getElementById(`get-ride-places-icon-2`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-2`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
            });
            break;
        case 3:
            document.getElementById(`get-ride-places-icon-3`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-3`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.remove('mained');
            });
            break;
        case 4:
            document.getElementById(`get-ride-places-icon-4`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.add('mained');

            });
            document.getElementById(`get-ride-places-icon-4`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.remove('mained');
            });
            break;
        case 5:
            document.getElementById(`get-ride-places-icon-5`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-5`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.remove('mained');
            });
            break;
        case 6:
            document.getElementById(`get-ride-places-icon-6`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-6`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-6`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-6`).classList.remove('mained');
            });
            break;
        case 7:
            document.getElementById(`get-ride-places-icon-7`).addEventListener('mouseover', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-6`).classList.add('mained');
                document.getElementById(`get-ride-places-icon-7`).classList.add('mained');
            });
            document.getElementById(`get-ride-places-icon-7`).addEventListener('mouseout', ()=>{
                document.getElementById(`get-ride-places-icon-1`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-2`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-3`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-4`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-5`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-6`).classList.remove('mained');
                document.getElementById(`get-ride-places-icon-7`).classList.remove('mained');
            });
            break;
        case 'default':
            break;
    }
}

document.getElementById('get-ride-button').addEventListener('click', ()=>{
    document.getElementById('popup-container').classList.remove('hidden');
    if(document.getElementById('user_from').value == document.getElementById('user_to').value){
        document.getElementById('first-popup').classList.add('hidden');
        document.getElementById('invalid-popup').classList.remove('hidden');
    }
    else{
        document.getElementById('first-popup').classList.remove('hidden');
        document.getElementById('invalid-popup').classList.add('hidden');
    }
});

document.getElementById('cancel-ride-button').addEventListener('click', ()=>{
    document.getElementById('popup-container').classList.add('hidden');
});

document.getElementById('cancel-ride-button-2').addEventListener('click', ()=>{
    document.getElementById('popup-container').classList.add('hidden');
});

document.getElementById('main-get-ride-button').addEventListener('click', ()=>{
    document.getElementById('first-popup').classList.add('hidden');
    document.getElementById('second-popup').classList.remove('hidden');
});

document.getElementById('exit-get-ride-button').addEventListener('click', ()=>{
    document.getElementById('popup-container').classList.add('hidden');
    document.getElementById('first-popup').classList.remove('hidden');
    document.getElementById('second-popup').classList.add('hidden');
});


document.getElementById('rides-button').classList.add('menu-item-active');

document.getElementById('get-ride-places-icon-0').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 1;
    if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
    if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
});

if(document.body.contains(document.getElementById('get-ride-places-icon-1'))){
    document.getElementById('get-ride-places-icon-1').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 2;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-2'))){
    document.getElementById('get-ride-places-icon-2').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 3;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-3'))){
    document.getElementById('get-ride-places-icon-3').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 4;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-4'))){
    document.getElementById('get-ride-places-icon-4').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 5;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-5'))){
    document.getElementById('get-ride-places-icon-5').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 6;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.remove('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-6'))){
    document.getElementById('get-ride-places-icon-6').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 7;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.remove('mained-clicked');
    });
}

if(document.body.contains(document.getElementById('get-ride-places-icon-7'))){
    document.getElementById('get-ride-places-icon-7').addEventListener('click', ()=>{
        document.getElementById('places_number').value = 8;
        if(document.body.contains(document.getElementById('get-ride-places-icon-1'))) document.getElementById('get-ride-places-icon-1').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-2'))) document.getElementById('get-ride-places-icon-2').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-3'))) document.getElementById('get-ride-places-icon-3').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-4'))) document.getElementById('get-ride-places-icon-4').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-5'))) document.getElementById('get-ride-places-icon-5').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-6'))) document.getElementById('get-ride-places-icon-6').classList.add('mained-clicked');
        if(document.body.contains(document.getElementById('get-ride-places-icon-7'))) document.getElementById('get-ride-places-icon-7').classList.add('mained-clicked');
    });
}