cityesDB = [];


//Main function what is called by the google maps api
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

    //vaiables for frontend and backend store arrays
    var distance = 0;
    var time = 0;
    var path = [];
    var cityesBetween = [];

    //Counters how many waypoints
    var waypointCounter = 1;

    //Variables for property get langituds and longituds from the input fields
    var splittedStart = [];
    var splittedMiddle = [];
    var splittedEnd = [];

    //Get the cities from database
    $.get('/en/load-data', function(data){
        cityesDB = data;
    });

    //Render the direction depending on the google request
    function renderDirections(result) {
        var directionsRenderer = new google.maps.DirectionsRenderer;
        directionsRenderer.setMap(map);
        directionsRenderer.setDirections(result);

		console.log(result);
        
        //Calculate travel distance and duration
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
        //Create latlng object type from all path over the rote
        for (var j=0; j<result.routes[0].overview_path.length; ++j){
            var latlng = { lat: result.routes[0].overview_path[j].lat().toFixed(2), lng: result.routes[0].overview_path[j].lng().toFixed(2) }
            path.push(latlng);
        }

        //Get all between cities names and id, store it in arrays
        for(var i=0; i<path.length; ++i){
            for(var j=0; j<cityesDB.length; ++j){
                if( (Math.abs(path[i].lat - cityesDB[j].latitude) < 0.015) && (Math.abs(path[i].lng - cityesDB[j].longitude) < 0.015) ){
                    if(!cityesBetween.includes(cityesDB[j].id)){
                        cityesBetween.push(cityesDB[j].id)
                    }
                }
            }
        }

        //Take between citties into the form to send with the html
        document.getElementById('between-cities').innerHTML = "";
        for(var i=0; i<cityesBetween.length; ++i){
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", `between-cities-${cityesBetween[i]}`);
            input.setAttribute("value", cityesBetween[i]);
            document.getElementById('between-cities').appendChild(input);
        }
    }


    var directionsService = new google.maps.DirectionsService;
    //Request the first direction depends on 2 waypoints
    function requestDirections(start1, start2, end1, end2) {   
        startltdlng = new google.maps.LatLng(start1, start2); 
        endltdlng = new google.maps.LatLng(end1, end2); 

        directionsService.route({
			origin: startltdlng,
			destination: endltdlng,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
			}, function(result) {
				renderDirections(result);
        });
    }

    //Request the more complicated directions, have multiple waypoints
    function requestDirections2(start1, start2, waypts, end1, end2) {   
        startltdlng = new google.maps.LatLng(start1, start2); 
        endltdlng = new google.maps.LatLng(end1, end2); 

        directionsService.route({
			origin: startltdlng,
			destination: endltdlng,
			waypoints: waypts,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
			}, function(result) {
				renderDirections(result);
			});
    }

    //Show form 2
    document.getElementById('search-button').addEventListener('click', ()=>{
        //Check the frontend valuation for form 1
        if(document.getElementById("start").value == 'nothing' || document.getElementById("end").value == 'nothing'){
            if(document.getElementById("start").value == 'nothing'){
                document.getElementById("start-text").classList.add('red-color');
            }
            else{
                document.getElementById("start-text").classList.remove('red-color');
            }
            if(document.getElementById("end").value == 'nothing'){
                document.getElementById("finish-text").classList.add('red-color');
            }
            else{
                document.getElementById("finish-text").classList.remove('red-color');
            }
        }
        else if(document.getElementById("start").value == document.getElementById("end").value){
            document.getElementById("start-text").classList.add('red-color');
            document.getElementById("finish-text").classList.add('red-color');
        }
        else{
            //Hide the first form, shows the second
            document.getElementById('form-1').classList.add('hide');
            document.getElementById('form-2').classList.add('show');
            document.getElementById('wizzard-navbar-2').setAttribute("data-wizard-state", "current");

            //Call the first direction renderer on 2 waypoints
            splittedStart = document.getElementById("start").value.split(" ");
            splittedEnd = document.getElementById("end").value.split(" ");
            requestDirections(splittedStart[0], splittedStart[1], splittedEnd[0], splittedEnd[1]);
            distance = 0;
            time = 0;
            path = [];
            cityesBetween = [];

            //Take the waypoints on to the form
            document.getElementById('all-waypoints').innerHTML = "";
            //Start coordinates
            var input1 = document.createElement("input");
            input1.setAttribute("type", "hidden");
            input1.setAttribute("name", `waypoint-start-ltdlng`);
            input1.setAttribute("value", splittedStart[0] + ' ' + splittedStart[1]);
            document.getElementById('all-waypoints').appendChild(input1);

            //End coordinates
            var input2 = document.createElement("input");
            input2.setAttribute("type", "hidden");
            input2.setAttribute("name", `waypoint-end-ltdlng`);
            input2.setAttribute("value", splittedEnd[0] + ' ' + splittedEnd[1]);
            document.getElementById('all-waypoints').appendChild(input2);
            }
    })

    //Show the new route, with new waypoints
    document.getElementById('middle-button').addEventListener('click', ()=>{
        if(document.getElementById('middle0').value != 'nothing'){
            document.getElementById('map').innerHTML = "";
            map = new google.maps.Map(document.getElementById("map"), {
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
            distance = 0;
            time = 0;
            path = []
            cityesBetween = [];
            var waypts = [];

            //Go through all the waypoint inputs and get the coordinates
            for(var i=0; i<waypointCounter; ++i){
                if(document.getElementById(`middle${i}`).value != 'nothing'){
                    splittedMiddle = document.getElementById(`middle${i}`).value.split(" ");
                    stopp = new google.maps.LatLng(splittedMiddle[0], splittedMiddle[1]);
                    waypts.push({
                        location: stopp,
                        stopover: true
                    });
                }
            }
            requestDirections2(splittedStart[0], splittedStart[1], waypts, splittedEnd[0], splittedEnd[1]);

            //Take the waypoints on to the form
            document.getElementById('all-waypoints').innerHTML = "";

            //Start coordinates
            var input1 = document.createElement("input");
            input1.setAttribute("type", "hidden");
            input1.setAttribute("name", `waypoint-start-ltdlng`);
            input1.setAttribute("value", splittedStart[0] + ' ' + splittedStart[1]);
            document.getElementById('all-waypoints').appendChild(input1);

            //Waypoints between coordinates
            for(var i=0; i<waypointCounter; ++i){
                if(document.getElementById(`middle${i}`).value != 'nothing'){
                    splittedMiddle = document.getElementById(`middle${i}`).value.split(" ");
                    var input3 = document.createElement("input");
                    input3.setAttribute("type", "hidden");
                    input3.setAttribute("name", `waypoint-${i}-ltdlng`);
                    input3.setAttribute("value", splittedMiddle[0] + ' ' + splittedMiddle[1]);
                    document.getElementById('all-waypoints').appendChild(input3);
                }
            }

            //End coordinates
            var input2 = document.createElement("input");
            input2.setAttribute("type", "hidden");
            input2.setAttribute("name", `waypoint-end-ltdlng`);
            input2.setAttribute("value", splittedEnd[0] + ' ' + splittedEnd[1]);
            document.getElementById('all-waypoints').appendChild(input2);
        }
        else{
            document.getElementById('map').innerHTML = "";
            map = new google.maps.Map(document.getElementById("map"), {
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
            distance = 0;
            time = 0;
            path = []
            cityesBetween = [];
            var waypts = [];
            
            requestDirections(splittedStart[0], splittedStart[1], splittedEnd[0], splittedEnd[1]);
            
            distance = 0;
            time = 0;
            path = [];
            cityesBetween = [];
        }
    });

    //Adding new across city input
    document.getElementById('new-input-button').addEventListener('click', ()=>{
        if(document.getElementById(`middle${waypointCounter-1}`).value != 'nothing'){
            document.getElementById(`middle${waypointCounter}-input`).classList.remove('hide');
            ++waypointCounter;
            if(waypointCounter == 5){
                document.getElementById('new-input-button').classList.add('hide');
            }
        }
    });

    //remove across city input
    document.getElementById('middle-cancel-input-icon').addEventListener('click', ()=>{
        if(document.getElementById(`middle0-input`).disabled == true && waypointCounter == 1){
            document.getElementById(`middle0-input`).disabled = false;
            document.getElementById(`middle0-input`).value = '';
            document.getElementById(`middle0`).value = 'nothing';
        }
        if(document.body.contains(document.getElementById(`middle${waypointCounter-2}-input`))){
            if(document.getElementById(`middle${waypointCounter-2}-input`).disabled == true){
                document.getElementById(`middle${waypointCounter-1}-input`).classList.add('hide');
                document.getElementById(`middle${waypointCounter-1}-input`).value = '';
                document.getElementById(`middle${waypointCounter-1}-input`).disabled = false;
                document.getElementById(`middle${waypointCounter-1}`).value = 'nothing';
                --waypointCounter;
                if(waypointCounter < 5){
                    document.getElementById('new-input-button').classList.remove('hide');
                }
            }
        }
    });
}

//Create the live search
startInput = document.getElementById('start-input');
endInput = document.getElementById('end-input');
middle0Input = document.getElementById('middle0-input');
middle1Input = document.getElementById('middle1-input');
middle2Input = document.getElementById('middle2-input');
middle3Input = document.getElementById('middle3-input');
middle4Input = document.getElementById('middle4-input');

function removeAccents (str) {
    var map = {
        '-' : ' ',
        '-' : '_',
        'a' : 'á|à|ã|â|À|Á|Ã|Â',
        'e' : 'é|è|ê|É|È|Ê',
        'i' : 'í|ì|î|Í|Ì|Î',
        'o' : 'ó|ò|ô|õ|Ó|Ò|Ô|Õ|ö|Ö|ő|Ő',
        'u' : 'ú|ù|û|ü|Ú|Ù|Û|Ü',
        'c' : 'ç|Ç',
        'n' : 'ñ|Ñ'
    };
    
    for (var pattern in map) {
        str = str.replace(new RegExp(map[pattern], 'g'), pattern);
    };

    return str;
};

startInput.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('start').value = 'nothing';
    }
    document.getElementById('end-searcher').classList.remove('show');
    document.getElementById('start-searcher').innerHTML = '';
    document.getElementById('start-searcher').classList.add('show');
    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('start').value = this.id;
                document.getElementById('start-searcher').classList.remove('show');
                startInput.value = this.innerText;
                startInput.disabled = true;
                document.getElementById('start-cancel-icon').classList.add('show-icon');
            };
            document.getElementById('start-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('start').value = this.id;
                document.getElementById('start-searcher').classList.remove('show');
                startInput.value = this.innerText;
                startInput.disabled = true;
                document.getElementById('start-cancel-icon').classList.add('show-icon');
            };
            document.getElementById('start-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('start').value = this.id;
                document.getElementById('start-searcher').classList.remove('show');
                startInput.value = this.innerText;
                startInput.disabled = true;
                document.getElementById('start-cancel-icon').classList.add('show-icon');
            };
            document.getElementById('start-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('start-searcher').innerHTML == ''){
        document.getElementById('start-searcher').classList.remove('show');
    }
    if(startInput.value == ''){
        document.getElementById('start-searcher').classList.remove('show');
    }
});

document.getElementById('start-cancel-icon').addEventListener('click', ()=>{
    document.getElementById('start-cancel-icon').classList.remove('show-icon');
    startInput.disabled = false;
    document.getElementById('start').value = 'nothing';
    startInput.value = '';
});

endInput.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('end').value = 'nothing';
    }
    document.getElementById('start-searcher').classList.remove('show');
    document.getElementById('end-searcher').innerHTML = '';
    document.getElementById('end-searcher').classList.add('show');
    for(var i=0; i<cityesDB.length; ++i){

        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
            };
            document.getElementById('end-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
            };
    
            document.getElementById('end-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
            };
            document.getElementById('end-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('end-searcher').innerHTML == ''){
        document.getElementById('end-searcher').classList.remove('show');
    }
    if(endInput.value == ''){
        document.getElementById('end-searcher').classList.remove('show');
    }
});

document.getElementById('end-cancel-icon').addEventListener('click', ()=>{
    document.getElementById('end-cancel-icon').classList.remove('show-icon');
    endInput.disabled = false;
    document.getElementById('end').value = 'nothing';
    endInput.value = '';
});

middle0Input.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('middle0').value = 'nothing';
    }

    document.getElementById('middle0-searcher').innerHTML = '';
    document.getElementById('middle0-searcher').classList.add('show');

    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(middle0Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle0').value = this.id;
                document.getElementById('middle0-searcher').classList.remove('show');
                middle0Input.value = this.innerText;
                middle0Input.disabled = true;
            };
            document.getElementById('middle0-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(middle0Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle0').value = this.id;
                document.getElementById('middle0-searcher').classList.remove('show');
                middle0Input.value = this.innerText;
                middle0Input.disabled = true;
            };
            document.getElementById('middle0-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(middle0Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle0').value = this.id;
                document.getElementById('middle0-searcher').classList.remove('show');
                middle0Input.value = this.innerText;
                middle0Input.disabled = true;
            };
            document.getElementById('middle0-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('middle0-searcher').innerHTML == ''){
        document.getElementById('middle0-searcher').classList.remove('show');
    }
    if(middle0Input.value == ''){
        document.getElementById('middle0-searcher').classList.remove('show');
    }
});

middle1Input.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('middle1').value = 'nothing';
    }

    document.getElementById('middle1-searcher').innerHTML = '';
    document.getElementById('middle1-searcher').classList.add('show');

    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(middle1Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle1').value = this.id;
                document.getElementById('middle1-searcher').classList.remove('show');
                middle1Input.value = this.innerText;
                middle1Input.disabled = true;
            };
            document.getElementById('middle1-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(middle1Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle1').value = this.id;
                document.getElementById('middle1-searcher').classList.remove('show');
                middle1Input.value = this.innerText;
                middle1Input.disabled = true;
            };
            document.getElementById('middle1-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(middle1Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle1').value = this.id;
                document.getElementById('middle1-searcher').classList.remove('show');
                middle1Input.value = this.innerText;
                middle1Input.disabled = true;
            };
            document.getElementById('middle1-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('middle1-searcher').innerHTML == ''){
        document.getElementById('middle1-searcher').classList.remove('show');
    }
    if(middle1Input.value == ''){
        document.getElementById('middle1-searcher').classList.remove('show');
    }
});

middle2Input.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('middle2').value = 'nothing';
    }

    document.getElementById('middle2-searcher').innerHTML = '';
    document.getElementById('middle2-searcher').classList.add('show');

    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(middle2Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle2').value = this.id;
                document.getElementById('middle2-searcher').classList.remove('show');
                middle2Input.value = this.innerText;
                middle2Input.disabled = true;
            };
            document.getElementById('middle2-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(middle2Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle2').value = this.id;
                document.getElementById('middle2-searcher').classList.remove('show');
                middle2Input.value = this.innerText;
                middle2Input.disabled = true;
            };
            document.getElementById('middle2-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(middle2Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle2').value = this.id;
                document.getElementById('middle2-searcher').classList.remove('show');
                middle2Input.value = this.innerText;
                middle2Input.disabled = true;
            };
            document.getElementById('middle2-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('middle2-searcher').innerHTML == ''){
        document.getElementById('middle2-searcher').classList.remove('show');
    }
    if(middle2Input.value == ''){
        document.getElementById('middle2-searcher').classList.remove('show');
    }
});


middle3Input.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('middle3').value = 'nothing';
    }

    document.getElementById('middle3-searcher').innerHTML = '';
    document.getElementById('middle3-searcher').classList.add('show');

    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(middle3Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle3').value = this.id;
                document.getElementById('middle3-searcher').classList.remove('show');
                middle3Input.value = this.innerText;
                middle3Input.disabled = true;
            };
            document.getElementById('middle3-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(middle3Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle3').value = this.id;
                document.getElementById('middle3-searcher').classList.remove('show');
                middle3Input.value = this.innerText;
                middle3Input.disabled = true;
            };
            document.getElementById('middle3-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(middle3Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle3').value = this.id;
                document.getElementById('middle3-searcher').classList.remove('show');
                middle3Input.value = this.innerText;
                middle3Input.disabled = true;
            };
            document.getElementById('middle3-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('middle3-searcher').innerHTML == ''){
        document.getElementById('middle3-searcher').classList.remove('show');
    }
    if(middle3Input.value == ''){
        document.getElementById('middle3-searcher').classList.remove('show');
    }
});


middle4Input.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('middle4').value = 'nothing';
    }

    document.getElementById('middle4-searcher').innerHTML = '';
    document.getElementById('middle4-searcher').classList.add('show');

    for(var i=0; i<cityesDB.length; ++i){
        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(middle4Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle4').value = this.id;
                document.getElementById('middle4-searcher').classList.remove('show');
                middle4Input.value = this.innerText;
            };
            document.getElementById('middle4-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(middle4Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle4').value = this.id;
                document.getElementById('middle4-searcher').classList.remove('show');
                middle4Input.value = this.innerText;
            };
            document.getElementById('middle4-searcher').appendChild(citySpan);
        }
        else if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(middle4Input.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].latitude} ${cityesDB[i].longitude}`;
            citySpan.onclick = function () {
                document.getElementById('middle4').value = this.id;
                document.getElementById('middle4-searcher').classList.remove('show');
                middle4Input.value = this.innerText;
            };
            document.getElementById('middle4-searcher').appendChild(citySpan);
        }
    }
    if(document.getElementById('middle4-searcher').innerHTML == ''){
        document.getElementById('middle4-searcher').classList.remove('show');
    }
    if(middle4Input.value == ''){
        document.getElementById('middle4-searcher').classList.remove('show');
    }
});

document.body.addEventListener('click', ()=>{
    document.getElementById('start-searcher').classList.remove('show');
    document.getElementById('end-searcher').classList.remove('show');
    document.getElementById('middle0-searcher').classList.remove('show');
    document.getElementById('middle1-searcher').classList.remove('show');
    document.getElementById('middle2-searcher').classList.remove('show');
    document.getElementById('middle3-searcher').classList.remove('show');
    document.getElementById('middle4-searcher').classList.remove('show');
}); 



    //Show form 3
    document.getElementById('form-2-button').addEventListener('click', ()=>{
        document.getElementById('form-2').classList.remove('show');
        document.getElementById('form-3').classList.add('show');
        document.getElementById('wizzard-navbar-3').setAttribute("data-wizard-state", "current");

    });

    //Creates an sql datetime format from 3 input field on form 3
    document.getElementById('create-ride-button').addEventListener('click', ()=>{
        const dateTimeFromater = document.getElementById('ride-date').value + " " + document.getElementById('ride-date-hours').value + ":" + document.getElementById('ride-date-minutes').value + ":00";
        document.getElementById('formated_date').value = dateTimeFromater;

        setTimeout(function(){ document.getElementById('new-ride-form').submit(); }, 800);
        //show popup
        document.getElementById('popup-container').classList.remove('hide');
    });

    //Front end validation
    //Validate first date
    document.getElementById('ride-date').addEventListener('change', ()=>{
        document.getElementById('validation-icon-1').classList.add('accepted');
        document.getElementById('validation-icon-1').classList.remove('fa-times-circle');
        document.getElementById('validation-icon-1').classList.add('fa-check-circle');
        checkValidation();
    });

    //validate hours and minutes
    document.getElementById('ride-date-hours').addEventListener('change', ()=>{
        if(document.getElementById('ride-date-minutes').value != 'nothing'){
            document.getElementById('validation-icon-2').classList.add('accepted');
            document.getElementById('validation-icon-2').classList.remove('fa-times-circle');
            document.getElementById('validation-icon-2').classList.add('fa-check-circle');
        }
        checkValidation();
    });
    document.getElementById('ride-date-minutes').addEventListener('change', ()=>{
        if(document.getElementById('ride-date-hours').value != 'nothing'){
            document.getElementById('validation-icon-2').classList.add('accepted');
            document.getElementById('validation-icon-2').classList.remove('fa-times-circle');
            document.getElementById('validation-icon-2').classList.add('fa-check-circle');
        }
        checkValidation();
    });

//validate price and curency
document.getElementById('currency_type').addEventListener('change', ()=>{
    if(document.getElementById('currency_type').value == 'Free'){
        document.getElementById('price_cost').disabled = true;
        document.getElementById('price_cost').value = '0';
        document.getElementById('validation-icon-3').classList.add('accepted');
        document.getElementById('validation-icon-3').classList.remove('fa-times-circle');
        document.getElementById('validation-icon-3').classList.add('fa-check-circle');
    }
    else{
        document.getElementById('price_cost').value = '';
        document.getElementById('price_cost').classList.remove('hide');
        document.getElementById('price_cost').disabled = false;
        document.getElementById('validation-icon-3').classList.remove('accepted');
        document.getElementById('validation-icon-3').classList.add('fa-times-circle');
        document.getElementById('validation-icon-3').classList.remove('fa-check-circle');
    }
    checkValidation();
    if(document.getElementById('price_cost').value != ''){
        if(!isNaN(document.getElementById('price_cost').value)){
            document.getElementById('validation-icon-3').classList.add('accepted');
            document.getElementById('validation-icon-3').classList.remove('fa-times-circle');
            document.getElementById('validation-icon-3').classList.add('fa-check-circle');
        }
    }
    checkValidation();
});

document.getElementById('price_cost').addEventListener('keyup', ()=>{
    checkValidation();
    if(!isNaN(document.getElementById('price_cost').value) && document.getElementById('currency_type').value != ''){
        document.getElementById('validation-icon-3').classList.add('accepted');
        document.getElementById('validation-icon-3').classList.remove('fa-times-circle');
        document.getElementById('validation-icon-3').classList.add('fa-check-circle');
    }
    if(document.getElementById('price_cost').value == '' || isNaN(document.getElementById('price_cost').value)){
        document.getElementById('validation-icon-3').classList.remove('accepted');
        document.getElementById('validation-icon-3').classList.add('fa-times-circle');
        document.getElementById('validation-icon-3').classList.remove('fa-check-circle');
    }
    checkValidation();
});

//Check all three validation, enable or disable the Create Ride main submit button
function checkValidation(){
    if(document.getElementById('validation-icon-1').classList.contains('accepted') && document.getElementById('validation-icon-2').classList.contains('accepted') && document.getElementById('validation-icon-3').classList.contains('accepted')){
        document.getElementById('create-ride-button').disabled = false;
        document.getElementById('create-ride-button').classList.remove('btn-secondary');
        document.getElementById('create-ride-button').classList.add('btn-success');
    }
    else{
        document.getElementById('create-ride-button').disabled = true;
        document.getElementById('create-ride-button').classList.add('btn-secondary');
        document.getElementById('create-ride-button').classList.remove('btn-success');
    }
}

//Create option elements for hours and minutes select
for(var i=0; i<=23; ++i){
    var option = document.createElement("option");
    option.text = i;
    option.value = i;
    document.getElementById('ride-date-hours').add(option);
}

//Create option elements for hours and minutes select
for(var i=0; i<=59; ++i){
    var option = document.createElement("option");
    option.text = i;
    option.value = i;
    document.getElementById('ride-date-minutes').add(option);
}

//Make date choose input shows only future dates
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
document.getElementById('ride-date').min = today;


    

//Frontend design for places icons
document.getElementById('places-icon-2').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
});
document.getElementById('places-icon-2').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
});
document.getElementById('places-icon-3').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
});
document.getElementById('places-icon-3').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
});
document.getElementById('places-icon-4').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
    document.getElementById('places-icon-4').classList.add('mained');
});
document.getElementById('places-icon-4').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
    document.getElementById('places-icon-4').classList.remove('mained');
});
document.getElementById('places-icon-5').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
    document.getElementById('places-icon-4').classList.add('mained');
    document.getElementById('places-icon-5').classList.add('mained');
});
document.getElementById('places-icon-5').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
    document.getElementById('places-icon-4').classList.remove('mained');
    document.getElementById('places-icon-5').classList.remove('mained');
});
document.getElementById('places-icon-6').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
    document.getElementById('places-icon-4').classList.add('mained');
    document.getElementById('places-icon-5').classList.add('mained');
    document.getElementById('places-icon-6').classList.add('mained');
});
document.getElementById('places-icon-6').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
    document.getElementById('places-icon-4').classList.remove('mained');
    document.getElementById('places-icon-5').classList.remove('mained');
    document.getElementById('places-icon-6').classList.remove('mained');
});
document.getElementById('places-icon-7').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
    document.getElementById('places-icon-4').classList.add('mained');
    document.getElementById('places-icon-5').classList.add('mained');
    document.getElementById('places-icon-6').classList.add('mained');
    document.getElementById('places-icon-7').classList.add('mained');
});
document.getElementById('places-icon-7').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
    document.getElementById('places-icon-4').classList.remove('mained');
    document.getElementById('places-icon-5').classList.remove('mained');
    document.getElementById('places-icon-6').classList.remove('mained');
    document.getElementById('places-icon-7').classList.remove('mained');
});
document.getElementById('places-icon-8').addEventListener('mouseover', ()=>{
    document.getElementById('places-icon-2').classList.add('mained');
    document.getElementById('places-icon-3').classList.add('mained');
    document.getElementById('places-icon-4').classList.add('mained');
    document.getElementById('places-icon-5').classList.add('mained');
    document.getElementById('places-icon-6').classList.add('mained');
    document.getElementById('places-icon-7').classList.add('mained');
    document.getElementById('places-icon-8').classList.add('mained');
});
document.getElementById('places-icon-8').addEventListener('mouseout', ()=>{
    document.getElementById('places-icon-2').classList.remove('mained');
    document.getElementById('places-icon-3').classList.remove('mained');
    document.getElementById('places-icon-4').classList.remove('mained');
    document.getElementById('places-icon-5').classList.remove('mained');
    document.getElementById('places-icon-6').classList.remove('mained');
    document.getElementById('places-icon-7').classList.remove('mained');
    document.getElementById('places-icon-8').classList.remove('mained');
});
document.getElementById('places-icon-1').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 1;
    document.getElementById('places-icon-2').classList.remove('mained-clicked');
    document.getElementById('places-icon-3').classList.remove('mained-clicked');
    document.getElementById('places-icon-4').classList.remove('mained-clicked');
    document.getElementById('places-icon-5').classList.remove('mained-clicked');
    document.getElementById('places-icon-6').classList.remove('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-2').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 2;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.remove('mained-clicked');
    document.getElementById('places-icon-4').classList.remove('mained-clicked');
    document.getElementById('places-icon-5').classList.remove('mained-clicked');
    document.getElementById('places-icon-6').classList.remove('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-3').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 3;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.remove('mained-clicked');
    document.getElementById('places-icon-5').classList.remove('mained-clicked');
    document.getElementById('places-icon-6').classList.remove('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-4').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 4;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.add('mained-clicked');
    document.getElementById('places-icon-5').classList.remove('mained-clicked');
    document.getElementById('places-icon-6').classList.remove('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-5').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 5;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.add('mained-clicked');
    document.getElementById('places-icon-5').classList.add('mained-clicked');
    document.getElementById('places-icon-6').classList.remove('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-6').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 6;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.add('mained-clicked');
    document.getElementById('places-icon-5').classList.add('mained-clicked');
    document.getElementById('places-icon-6').classList.add('mained-clicked');
    document.getElementById('places-icon-7').classList.remove('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-7').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 7;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.add('mained-clicked');
    document.getElementById('places-icon-5').classList.add('mained-clicked');
    document.getElementById('places-icon-6').classList.add('mained-clicked');
    document.getElementById('places-icon-7').classList.add('mained-clicked');
    document.getElementById('places-icon-8').classList.remove('mained-clicked');
});
document.getElementById('places-icon-8').addEventListener('click', ()=>{
    document.getElementById('places_number').value = 8;
    document.getElementById('places-icon-2').classList.add('mained-clicked');
    document.getElementById('places-icon-3').classList.add('mained-clicked');
    document.getElementById('places-icon-4').classList.add('mained-clicked');
    document.getElementById('places-icon-5').classList.add('mained-clicked');
    document.getElementById('places-icon-6').classList.add('mained-clicked');
    document.getElementById('places-icon-7').classList.add('mained-clicked');
    document.getElementById('places-icon-8').classList.add('mained-clicked');
});

//Color the menu button
document.getElementById('ride-create-button').classList.add('menu-item-active');