//Count the chat in live
chatCounter1 = document.getElementById('chat-span-counter-1');
chatCounter2 = document.getElementById('chat-span-counter-2');
ListenerForNewMessage();
messagesCounter = 0;

async function ListenerForNewMessage(){
    await firebase.firestore().collection('messages').onSnapshot(function(snapshot) {
         if (window.location.href.indexOf("chat") == -1){
            snapshot.docChanges().forEach(function(change) {
                if (change.type === "added" && !change.doc.data().checked && change.doc.data().user_to == document.getElementById('signed-user-id').value) {
                    messagesCounter++;
                    chatCounter1.innerText = messagesCounter;
                    chatCounter2.innerText = messagesCounter;
                    document.getElementById('notification-audio').play();
                    document.getElementById('notification-audio').muted = false;

                    //send email with the message, only once
                    if(!change.doc.data().emailed){

                        //set emailed to true
                        firebase.firestore().collection("messages").doc(change.doc.data().id).update({
                            emailed: true
                        });

                        message = change.doc.data().message;
                        user_to = change.doc.data().user_to;
                        user_from = change.doc.data().user_from;
    
                        $.ajax({
                            url: '/sendEmailMessage/' + user_to + '/' + user_from + '/' + message,
                            type: 'get',    
                            dataType: 'json',
                            success: function (response) {
                            }
                        });
                    }
                }
            });
         }

    });
};

//Counter the notifications and the messages
setInterval(function(){ 
    mobileCounter = document.getElementById('user-icon-mobile-counter');
    desktopCounter = document.getElementById('user-icon-desktop-counter');

    //get the numbers of unreaded messages
    chatMessages = parseInt(chatCounter1.innerText);

    //get the numbers of unreaded notifications
    notifications = parseInt(document.getElementById('html-notifications-number-desktop').innerText);

    //Take the numbers on the right corner of the user icon
    if((chatMessages + notifications) > 0){
        mobileCounter.classList.remove('hide');
        mobileCounter.innerText = (chatMessages + notifications);
        desktopCounter.classList.remove('hide');
        desktopCounter.innerText = (chatMessages + notifications);
    }
    else{
        mobileCounter.classList.add('hide');
        mobileCounter.innerText = 0;
        desktopCounter.classList.add('hide');
        desktopCounter.innerText = 0;
    }

}, 4000);


//Sending live notification!
setInterval(function(){ 
    beforeNotificationNumber = parseInt(document.getElementById('html-notifications-number').innerText);
    userId = document.getElementById('signed-user-id').value;

    $.ajax({
        url: '/getNotifications/' + userId,
        type: 'get',
        dataType: 'json',
        success: function(response){
        var len = 0;
        if(response['data'] != null){
            len = response['data'].length;
        }
        if(len > 0){
            document.getElementById('html-notifications-number').innerText = len;
            document.getElementById('html-notifications-number-desktop').innerText = len;
            if(beforeNotificationNumber < len){
                document.getElementById('notification-audio').play();
                document.getElementById('notification-audio').muted = false;
            }
        }else{
            document.getElementById('html-notifications-number').innerText = 0;
            document.getElementById('html-notifications-number-desktop').innerText = 0;
        }

        }
    });
}, 4000);