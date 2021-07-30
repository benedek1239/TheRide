@extends('layouts.app')

@section('content')

<link href="{{ asset('css/chat.css') }}" rel="stylesheet" type="text/css"/>

@php 
    use App\User;
    $user = auth()->user();
    if($userTo != $user->id){
        $userToChatWith = User::Where('id', $userTo)->get();
    }
@endphp

@if($userTo != $user->id)
    <input type="hidden" value="{{ $user->id }}" id="my-user-id">
    <input type="hidden" value="{{ $userTo }}" id="other-user-id">
    <input type="hidden" value="{{ $user->name }}" id="my-user-name">
    <input type="hidden" value="{{ $userToChatWith->first()->name }}" id="other-user-name">
    <input type="hidden" value="{{ $user->hasMedia('profile') ? url('/') . '/' . $user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}" id="my-user-img">
    <input type="hidden" value="{{ $userToChatWith->first()->hasMedia('profile') ? url('/') . '/' . $userToChatWith->first()->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}" id="other-user-img">
@else
    <input type="hidden" value="{{ $userTo }}" id="other-user-id">
    <input type="hidden" value="{{ $user->id }}" id="my-user-id">
@endif


<div class="d-flex flex-column-fluid">
    <div class=" container">
        <div class="d-flex flex-row">
            <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                <div class="card card-custom ">

                    <div class="card-body card-body-chat">

                        <div class="input-group input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >
                                     <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                        </svg></span>
                                    </span>
                            </div>
                            <input type="text" class="form-control py-4 h-auto" placeholder="{{ __('chat.name') }}" id="partner-search-input" />
                        </div>
        
                        <!--begin:Users-->
                        <div class="mt-7" id="users-holder">
           

                        </div>


                    </div>
                </div>
            </div>
        
            <div class="flex-row-fluid ml-lg-8"  id="kt_chat_content">
                <div class="card card-custom">

                    <div class="card-header align-items-center px-4 py-3">

                    <div class="text-left flex-grow-1">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"/>
                                <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>                    
                        </button>
                    </div>

                    @if($userTo != $user->id)
        
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5">{{$userToChatWith->first()->name}}</div>
                        
                        </div>
                        <div class="text-right flex-grow-1">

                        </div>
                        </div>
            
                        <div class="card-body card-body-left" id="scrollable-messages-div">
                            <div class="scroll scroll-pull" data-mobile-height="350">
                                <div class="messages" id="main-inner-messages">

                                </div>
                            </div>
                        </div>
            
                        <div class="card-footer align-items-center">
                            <textarea class="form-control border-0 p-0" rows="2" placeholder="{{ __('chat.type-message') }}" id="message-sending-textarea"></textarea>
                            <div class="d-flex align-items-center justify-content-between mt-5">
                                <div>
                                    <button type="button" onclick="sendMessage()" id="send-message-button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">{{ __('chat.send') }}</button>
                                </div>
                            </div>
                        </div>
                    @else
                        </div>
                        <div class="card-body card-body-left">
                            <div class="chat-welcome text-primary font-weight-bolder">
                                <i class="fas fa-comments fa-1x text-primary" aria-hidden="true"></i>
                                <span class="chat-welcome-text">Chat</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<audio controls id="chat-audio" muted hidden>
    <source src="{{ asset('soundEffects/chat.mp3') }}" type="audio/mpeg" >
</audio>


<script src="{{ asset('assets/js/pages/custom/chat/chat.js?v=7.0.6') }}"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCjOOKcKffluR9ts0pMPgTb6WB766E6m7w",
    authDomain: "theride-57efd.firebaseapp.com",
    databaseURL: "https://theride-57efd.firebaseio.com",
    projectId: "theride-57efd",
    storageBucket: "theride-57efd.appspot.com",
    messagingSenderId: "332772373460",
    appId: "1:332772373460:web:540b7afbb629f970ebdc41",
    measurementId: "G-SHMSHM6HGW"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>


<script>

otherUserId = document.getElementById('other-user-id').value;
myUserId = document.getElementById('my-user-id').value;
usersHolderDiv = document.getElementById('users-holder');
chatedUsers = [];
ListenerForNewMessage();
SetUnreadedMessagesToReaded();
messages = [];
firstRound = true;
newIncomingMessage = false;

//Check if we are on the welcome screen
if(otherUserId != myUserId){

    if(!chatedUsers.includes(parseInt(otherUserId))){
        chatedUsers.push(parseInt(otherUserId));
    }
    mainMessages = document.getElementById('main-inner-messages');
    myUserName = document.getElementById('my-user-name').value;
    otherUserName = document.getElementById('other-user-name').value;
    myUserImg = document.getElementById('my-user-img').value;
    otherUserImg = document.getElementById('other-user-img').value;
    textArea = document.getElementById('message-sending-textarea');
    messagesDiv = document.getElementById("scrollable-messages-div");

    //Scroll botton chat messages on load
    setTimeout(function(){ messagesDiv.scrollTop = messagesDiv.scrollHeight;} , 1000);

    //enter nyomásának figyelése
    textArea.addEventListener('keyup', function(event) {
        event.preventDefault();
            if (event.keyCode === 13 && textArea.value.trim() != "") {
                document.getElementById("send-message-button").click();
            }
    });
}


//Go through the database and get the messages, always listen for the new messages
async function ListenerForNewMessage(){
    await firebase.firestore().collection('messages').onSnapshot(function(snapshot) {
        snapshot.docChanges().forEach(function(change) {
            if (change.type === "added") {
                messages.push(change.doc.data());
                if((!chatedUsers.includes(parseInt(change.doc.data().user_from)) && change.doc.data().user_from != myUserId && change.doc.data().user_to == myUserId)){
                    chatedUsers.push(parseInt(change.doc.data().user_from));
                }
                if((!chatedUsers.includes(parseInt(change.doc.data().user_to)) && change.doc.data().user_to != myUserId && change.doc.data().user_from == myUserId)){
                    chatedUsers.push(parseInt(change.doc.data().user_to));
                }
                if(otherUserId != myUserId){
                    if(change.doc.data().user_from == otherUserId && change.doc.data().user_to == myUserId){
                        fullDate = change.doc.data().created.toDate();
                        newdate = fullDate.getFullYear() + "-" + (fullDate.getMonth()+1) + "-" + fullDate.getDate() + " " +  fullDate.getHours() + ":" + fullDate.getMinutes();
                        takeIncomingMessage(otherUserName, otherUserImg, change.doc.data().message, newdate);
                        messagesDiv.scrollTop = messagesDiv.scrollHeight;

                        //Az üzenet ami érkezik és megjelenik legyen checked az adatbázisban
                        firebase.firestore().collection("messages").doc(change.doc.id).update({
                            checked: true
                        });
                    }
                    else if(change.doc.data().user_from == myUserId && change.doc.data().user_to == otherUserId){
                        fullDate = change.doc.data().created.toDate();
                        newdate = fullDate.getFullYear() + "-" + (fullDate.getMonth()+1) + "-" + fullDate.getDate() + " " +  fullDate.getHours() + ":" + fullDate.getMinutes();
                        takeSendedMessage(myUserName, myUserImg, change.doc.data().message, newdate);
                        messagesDiv.scrollTop = messagesDiv.scrollHeight;
                    }
                }
                if(change.doc.data().user_from != myUserId && change.doc.data().user_from != otherUserId){
                    newIncomingMessage = true;
                }
            }
        })
        if(newIncomingMessage || firstRound){
            createUserPickerCard(chatedUsers);
            firstRound = false;
            newIncomingMessage = false;
        }
    });


}


//Create left sided navbar users chat window
function createUserPickerCard(Users){

    allUnreadedMessages = 0;

    usersHolderDiv.innerHTML = "";

    for(i=0; i<Users.length; ++i){
        $.ajax({
            method: 'GET',
            url: '/load-user/' + Users[i],
            success: function (data) {

                unreadedMessages = 0;

                for(i=0; i<messages.length; ++i){
                    if(messages[i].checked == false && messages[i].user_from == data.id && otherUserId != data.id){
                        ++unreadedMessages;
                        document.getElementById('chat-audio').play();
                        document.getElementById('chat-audio').muted = false;
                    }
                }
                allUnreadedMessages += unreadedMessages;
                document.getElementById('chat-span-counter-1').innerText = allUnreadedMessages;
                document.getElementById('chat-span-counter-2').innerText = allUnreadedMessages;
                         
                if(!document.body.contains(document.getElementById(`chat-profile-${data.id}`))){

                    bigDiv = document.createElement('div');
                    bigDiv.id = `chat-profile-${data.id}`;
                    bigDiv.className  = 'd-flex align-items-center justify-content-between mb-5';
                    header = document.createElement('div');
                    header.className  = 'd-flex align-items-center';
                    header1 = document.createElement('div');
                    header1.className  = 'symbol symbol-circle symbol-50 mr-3"';
                    profileImg = document.createElement('img');
                    profileImg.src = data.imgSrc;
                    header1.appendChild(profileImg);

                    header2 = document.createElement('div');
                    header2.className  = 'd-flex align-items-center';
                    profileLink = document.createElement('a');
                    profileLink.className = 'text-dark-75 text-hover-primary font-weight-bold font-size-lg barely-left-margined';
                    profileLink.innerText = data.name;

                    var url = "{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>':id'] ) }}";
                    url = url.replace(':id', data.id);
                    profileLink.href = url;
                    header2.appendChild(profileLink);

                    header.appendChild(header1);
                    header.appendChild(header2);

                    bigDiv.appendChild(header);

                    if(unreadedMessages > 0){
                        bottom = document.createElement('div');
                        bottom.className = 'd-flex flex-column align-items-end';
                        bottomSpan = document.createElement('span');
                        bottomSpan.className = 'label label-sm label-success';
                        bottomSpan.innerHTML = unreadedMessages;
                        bottom.appendChild(bottomSpan);

                        bigDiv.appendChild(bottom);
                    }

                    usersHolderDiv.appendChild(bigDiv);
                }
            }
        });

    }
    
}

//üzenet küldése
function sendMessage(){
    if(textArea.value != '' ){
        createMessageInDb(myUserId, otherUserId, textArea.value);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
        textArea.value = '';
    }
}

//üzenet feltöltése az adatbázisba
function createMessageInDb(userFrom, userTo, message) {
    mid = Date.now().toString();
    firebase.firestore().collection('messages').doc(mid).set({
        id: mid,
        user_from: userFrom,
        user_to: userTo,
        message: message,
        checked: false,
        emailed: false,
        created: new Date()
    });
}

//Olvasatlan üzenetek olvasottá tétele
function SetUnreadedMessagesToReaded(){

    firebase.firestore().collection('messages').where('user_from', '==', otherUserId).get().then(response => {
        let batch = firebase.firestore().batch()
        response.docs.forEach((doc) => {
            firebase.firestore().collection("messages").doc(doc.id).update({
                checked: true
            });
        })
    })
}

//fogadott üzenet HTML be helyezése
function takeIncomingMessage(otherUserName, otherUserImg, message, time){
    bigDiv = document.createElement('div');
    bigDiv.className  = 'd-flex flex-column mb-5 align-items-start';
    divHedaer = document.createElement('div');
    divHedaer.className = 'd-flex align-items-center';
    divInnerHedaer1 = document.createElement('div');
    divInnerHedaer1.className = 'symbol symbol-circle symbol-40 mr-3';
    otherUserImage = document.createElement('img');
    otherUserImage.src = otherUserImg;
    otherUserImage.className = 'icon-greened-back';
    otherUserNameDiv = document.createElement('div');
    otherUserNameDiv.className = 'text-dark-75 font-weight-bold font-size-h6';
    otherUserNameDiv.innerText = otherUserName;
    spanInnerHeader = document.createElement('span');
    spanInnerHeader.className = 'text-muted font-size-sm barely-left-margined';
    spanInnerHeader.innerText = time;
    divInnerHedaer1.appendChild(otherUserImage);
    divHedaer.appendChild(divInnerHedaer1);
    divHedaer.appendChild(otherUserNameDiv);
    divHedaer.appendChild(spanInnerHeader);
    bigDiv.appendChild(divHedaer);
    divBottom = document.createElement('div');
    divBottom.className = 'mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px';
    divBottom.innerText = message;
    bigDiv.appendChild(divBottom);
    mainMessages.appendChild(bigDiv);
}

//küldött üzenet HTML be helyezése
function takeSendedMessage(myUserName, myUserImg, message, time){
    bigDiv = document.createElement('div');
    bigDiv.className  = 'd-flex flex-column mb-5 align-items-end';
    divHedaer = document.createElement('div');
    divHedaer.className = 'd-flex align-items-center';
    divInnerHedaer1 = document.createElement('div');
    divInnerHedaer1.className = 'text-dark-75 font-weight-bold font-size-h6';
    divInnerHedaer1.innerText = myUserName;
    spanInnerHeader = document.createElement('span');
    spanInnerHeader.className = 'text-muted font-size-sm barely-right-margined';
    spanInnerHeader.innerText = time;
    imageHolderDiv = document.createElement('div');
    imageHolderDiv.className = 'symbol symbol-circle symbol-40 ml-3 icon-greened-back';
    otherUserImage = document.createElement('img');
    otherUserImage.className = 'icon-greened-back';
    otherUserImage.src = myUserImg;
    imageHolderDiv.appendChild(otherUserImage);
    divHedaer.appendChild(spanInnerHeader);
    divHedaer.appendChild(divInnerHedaer1);
    divHedaer.appendChild(imageHolderDiv);
    bigDiv.appendChild(divHedaer);
    divBottom = document.createElement('div');
    divBottom.className = 'mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px';
    divBottom.innerText = message;
    bigDiv.appendChild(divBottom);
    mainMessages.appendChild(bigDiv);
}


//Search partners on chat
partnerSearchInput = document.getElementById('partner-search-input');
elements = document.getElementById('users-holder').getElementsByTagName('a');;

partnerSearchInput.addEventListener('keyup',()=>{
    for(var i=0; i<elements.length; ++i){
        if(!elements[i].innerText.toLowerCase().includes(partnerSearchInput.value.toLowerCase())){
            elements[i].parentElement.parentElement.parentElement.classList.add('hide');
        }
        else{
            elements[i].parentElement.parentElement.parentElement.classList.remove('hide');
        }
    }
});

</script>

@endsection
