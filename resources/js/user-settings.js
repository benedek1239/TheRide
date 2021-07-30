
    document.getElementById('hidden-avatar-input').value = null;
    defaultProfilPicture = document.getElementById('profile-picture').src;
    function choosed(clickedAvatar){
            for(i=0; i<50; ++i){
                document.getElementById(`avatar-${i}`).classList.remove('filtered');
            }
            clickedAvatar.classList.add('filtered');
            document.getElementById('profile-picture').src = clickedAvatar.getElementsByTagName('img')[0].src;
            document.getElementById('hidden-avatar-input').value = clickedAvatar.getElementsByTagName('img')[0].id;
            document.getElementById('image-input').value = null;
        }

    document.getElementById('image-input').addEventListener('change', ()=>{
        var file = document.getElementById("image-input").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            for(i=0; i<50; ++i){
                document.getElementById(`avatar-${i}`).classList.remove('filtered');
            }
            document.getElementById('profile-picture').src = reader.result;        
        }
        if(file){
            reader.readAsDataURL(file);
        }
    });


    document.getElementById('remove-image').addEventListener("click", ()=>{
        for(i=0; i<50; ++i){
            document.getElementById(`avatar-${i}`).classList.remove('filtered');
        }
        document.getElementById('profile-picture').src = defaultProfilPicture;     
        document.getElementById('image-input').value = null;   
        document.getElementById('hidden-avatar-input').value = null;
    });
