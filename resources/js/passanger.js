
    cityesDB = [];
    
    //Get the cities from database
    $.get('/en/load-data', function(data){
        cityesDB = data;
    });

    //Create the live search
    startInput = document.getElementById('start-input');
    endInput = document.getElementById('end-input');
    
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

    startInput.addEventListener('keyup', (event)=>{3
        if(event.code){
            document.getElementById('start').value = 'nothing';
        }
        document.getElementById('end-searcher').classList.remove('show');
        document.getElementById('end-searcher').classList.add('hide');
        document.getElementById('start-searcher').innerHTML = '';
        document.getElementById('start-searcher').classList.remove('hide');
        document.getElementById('start-searcher').classList.add('show');

        for(var i=0; i<cityesDB.length; ++i){
            if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
                var citySpan = document.createElement('span');
                citySpan.className = "city-span";
                citySpan.innerText = `${cityesDB[i].name_hu}`;
                citySpan.id = `${cityesDB[i].id}`;
                citySpan.onclick = function () {
                    document.getElementById('start').value = this.id;
                    document.getElementById('start-searcher').classList.remove('show');
                    document.getElementById('start-searcher').classList.add('hide');
                    startInput.value = this.innerText;
                    startInput.disabled = true;
                    document.getElementById('start-cancel-icon').classList.add('show-icon');
                    document.getElementById('start-cancel-icon').classList.remove('hide');

                };
                document.getElementById('start-searcher').appendChild(citySpan);
            }
            if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
                var citySpan = document.createElement('span');
                citySpan.className = "city-span";
                citySpan.innerText = `${cityesDB[i].name_en}`;
                citySpan.id = `${cityesDB[i].id}`;
                citySpan.onclick = function () {
                    document.getElementById('start').value = this.id;
                    document.getElementById('start-searcher').classList.remove('show');
                    document.getElementById('start-searcher').classList.add('hide');
                    startInput.value = this.innerText;
                    startInput.disabled = true;
                    document.getElementById('start-cancel-icon').classList.add('show-icon');
                    document.getElementById('start-cancel-icon').classList.remove('hide');

                };
                document.getElementById('start-searcher').appendChild(citySpan);
            }
            if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(startInput.value.toLowerCase()))){
                var citySpan = document.createElement('span');
                citySpan.className = "city-span";
                citySpan.innerText = `${cityesDB[i].name_ro}`;
                citySpan.id = `${cityesDB[i].id}`;
                citySpan.onclick = function () {
                    document.getElementById('start').value = this.id;
                    document.getElementById('start-searcher').classList.remove('show');
                    document.getElementById('start-searcher').classList.add('hide');
                    startInput.value = this.innerText;
                    startInput.disabled = true;
                    document.getElementById('start-cancel-icon').classList.add('show-icon');
                    document.getElementById('start-cancel-icon').classList.remove('hide');
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
        document.getElementById('start-cancel-icon').classList.add('hide');
        startInput.disabled = false;
        document.getElementById('start').value = 'nothing';
        startInput.value = '';
    });


    
endInput.addEventListener('keyup', (event)=>{
    if(event.code){
        document.getElementById('end').value = 'nothing';
    }
    document.getElementById('start-searcher').classList.remove('show');
    document.getElementById('start-searcher').classList.add('hide');
    document.getElementById('end-searcher').innerHTML = '';
    document.getElementById('end-searcher').classList.add('show');
    document.getElementById('end-searcher').classList.remove('hide');

    for(var i=0; i<cityesDB.length; ++i){

        if(removeAccents(cityesDB[i].name_hu.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_hu}`;
            citySpan.id = `${cityesDB[i].id}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                document.getElementById('end-searcher').classList.add('hide');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
                document.getElementById('end-cancel-icon').classList.remove('hide');

            };
            document.getElementById('end-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_en.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_en}`;
            citySpan.id = `${cityesDB[i].id}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                document.getElementById('end-searcher').classList.add('hide');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
                document.getElementById('end-cancel-icon').classList.remove('hide');

            };
    
            document.getElementById('end-searcher').appendChild(citySpan);
        }
        if(removeAccents(cityesDB[i].name_ro.toLowerCase()).includes(removeAccents(endInput.value.toLowerCase()))){
            var citySpan = document.createElement('span');
            citySpan.className = "city-span";
            citySpan.innerText = `${cityesDB[i].name_ro}`;
            citySpan.id = `${cityesDB[i].id}`;
            citySpan.onclick = function () {
                document.getElementById('end').value = this.id;
                document.getElementById('end-searcher').classList.remove('show');
                document.getElementById('end-searcher').classList.add('hide');
                endInput.value = this.innerText;
                endInput.disabled = true;
                document.getElementById('end-cancel-icon').classList.add('show-icon');
                document.getElementById('end-cancel-icon').classList.remove('hide');

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
    document.getElementById('end-cancel-icon').classList.add('hide');
    endInput.disabled = false;
    document.getElementById('end').value = 'nothing';
    endInput.value = '';
});

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
document.getElementById('ridePassanger_date').min = today;

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formPassanger').submit(
            function( e ) {
            e.preventDefault();
                var formData = $(this).serialize();
                var form = $(this);
                var url = form.attr('action');
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    
                    success: function(result){
                        window.location = result;
                    },
                    
                    error: function(reject){
                        if( reject.status == 422 ) {
                            var errors = reject.responseJSON.errors;
                            $('.error-msg').text('');
                            $.each(errors, function (key, val) {
                                $('#' + key + '_error').text(val[0]);
                            });
                        }
                        
                
                    }
                    
                });

                if(document.getElementById("start_ride").value != 'nothing'){
                    $("#start_ride_error").remove();
                }
                if(document.getElementById("finish_ride").value != 'nothing'){
                    $("#finish_ride_error").remove();
                }
                
  
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;

                if(document.getElementById("ridePassanger_date").value >= today){
                    $("#ridePassanger_date_error").remove();
                }
                 
            
                if(document.getElementById("start_ride").value == 'nothing' || document.getElementById("finish_ride").value == 'nothing'){
                    if(document.getElementById("start_ride").value == 'nothing'){
                        document.getElementById("start_text").classList.add('red-color');
                    }
                    else{
                        
                        document.getElementById("start_text").classList.remove('red-color');
                    }
                    if(document.getElementById("finish_ride").value == 'nothing'){
                        document.getElementById("finish_text").classList.add('red-color');
                    }
                    else{
                        document.getElementById("finish_text").classList.remove('red-color');
                    }
                }
                else 
                    {   document.getElementById("start_text").classList.remove('red-color');
                        document.getElementById("finish_text").classList.remove('red-color');
                        if(document.getElementById("start_ride").value == document.getElementById("finish_ride").value){
                    document.getElementById("start_text").classList.add('red-color');
                    document.getElementById("finish_text").classList.add('red-color');
                    }
                }

                if(document.getElementById("ridePassanger_date").value >= today){
                    document.getElementById("passangerDate").classList.remove('red-color');
                }
                else{
                    document.getElementById("passangerDate").classList.add('red-color');
                }
        
            });

