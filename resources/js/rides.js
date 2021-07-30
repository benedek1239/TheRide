
document.getElementById('rides-button').classList.add('menu-item-active');

document.getElementById('scroll-home-icon').addEventListener('click', ()=>{
    $("html, body").animate({ scrollTop: 0 }, "fast");
});

document.getElementById('filter-rides-icon').addEventListener('click', ()=>{
    if(document.getElementById('filter-dropdown').classList.contains('show')){
        document.getElementById('filter-dropdown').classList.remove('show');
        document.getElementById('filter-rides-icon').classList.add('text-primary');
        document.getElementById('filter-rides-icon').classList.remove('text-success');
    }
    else{
        document.getElementById('filter-dropdown').classList.add('show');
        document.getElementById('filter-rides-icon').classList.remove('text-primary');
        document.getElementById('filter-rides-icon').classList.add('text-success');
    }
});

//Get every cities name on the rides menu
var cities = document.getElementsByClassName("city-name");

//Search for a given city name
searchInput = document.getElementById('search-rides-input');

searchInput.addEventListener('keyup', ()=>{
    for(var i=0; i<cities.length; ++i){
        if(!cities[i].innerText.toLowerCase().includes(searchInput.value.toLowerCase())){
            cities[i].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('hide');
        }
        else{
            cities[i].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.remove('hide');
        }
    }
});

