var nodeList1 = document.querySelectorAll('.start-time-date');
for (let i = 0; i < nodeList1.length; i++) {
    nodeList1[i].innerText = nodeList1[i].innerText.substring(0, 11);
}


var nodeList2 = document.querySelectorAll('.start-time-hours');
for (let i = 0; i < nodeList2.length; i++) {
    nodeList2[i].innerText = nodeList2[i].innerText.substring(11, 16);
}

rideWatchered = false; 
rideWatcherText = document.getElementById('ride-watcher-button').innerText;
requiredRideId = document.getElementById('required-ride-id').value;

function RideWatcher(button){
    if(rideWatchered){
        button.innerHTML = rideWatcherText;
        button.classList.add('btn-outline-danger');
        button.classList.remove('btn-outline-success');
        rideWatchered = false;
        $.ajax({
            url: '/setRideWatcher/' + requiredRideId + '/' + 0,
            type: 'get',
            dataType: 'json',
        });
    }
    else{
        button.innerHTML += '&nbsp;&nbsp;<i class="fas fa-check"></i>';
        button.classList.remove('btn-outline-danger');
        button.classList.add('btn-outline-success');
        rideWatchered = true;
        $.ajax({
            url: '/setRideWatcher/' + requiredRideId + '/' + 1,
            type: 'get',
            dataType: 'json',
        });
    }

}