//Nav
var count = 0;
$("#nav_icon").click(function(){
    if (count == 0){
        $(this).html('<i class="fa fa-times"></i>');
        $(this).prop("href", "#left_nav");
        count ++;
    } else {
        $(this).prop("href", "#");
        $(this).html('<i class="fa fa-bars"></i>');
        count = 0;
    }
});


//Tab transition
function openTab(evt, cityName) {
    let i, x, tablinks;
    x = document.getElementsByClassName("tabs");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab_button");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" primary", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " primary";
}



//Popup messages
function popup(message){
    var popup = document.createElement("div");
    popup.setAttribute("id","popup");
    popup.setAttribute("class","show");
    if (message.match(/success:/g)){ 
        popup.innerHTML = message.replace(/success:/g,"<i class='fa fa-check-circle-o'></i>");
        popup.classList.add("success");
    } else {
        popup.innerHTML = message.replace(/failure:/g,"<i class='fa fa-times-circle-o'></i>");
        popup.classList.add("failure");
    }
    document.body.appendChild(popup);
    setTimeout(function(){
            popup.className = popup.className.replace("show", "");
            popup.remove();
            }, 5000);
    return 1;
}



//Detect ESC keys
document.addEventListener("keydown", ({key}) => {
    if (key === "Escape"){
        window.location.href="#";
    }
});


//Change border & color if image input field got changed
$('input:file[name="image"]').change(
    function(){
        $(this).parent().css("border","2px dotted var(--primary)");
        $(this).parent().css("color","var(--primary)");
});


//Ajax
$(".add").click(function() {
    event.preventDefault();
    $(this).css('pointer-events','none');
    let serialize = new FormData($(".add_product_form")[0]);
    serialize.append('FormType', "Add_Product");
    $.ajax({
    type: "POST",
    url: "./root/",
    data: serialize,
    cache: false,
    contentType: false,
    processData: false,
    success: function(message){
        $(this).css('pointer-events','default');
        popup(message);
        setTimeout(function(){$('body').load(window.location.href + '#body')}, 5000);
        }
    });
});

function Featured(id, value){
    $(this).css('pointer-events','none');
    $.ajax({
    type: "POST",
    url: "./root/",
    data: "&FormType=update&type=featured&id="+id+"&value="+value,
    success: function(message){
        $(this).css('pointer-events','default');
        popup(message);
        setTimeout(function(){$('body').load(window.location.href + '#body')}, 5000);
        }
    });
}


//Popup messages
function popup(message){
    var popup = document.createElement("div");
    popup.setAttribute("id","popup");
    popup.setAttribute("class","show");
    if (message.match(/success:/g)){ 
        popup.innerHTML = message.replace(/success:/g,"<i class='fa fa-check-circle-o'></i>");
        popup.classList.add("success");
    } else {
        popup.innerHTML = message.replace(/failure:/g,"<i class='fa fa-times-circle-o'></i>");
        popup.classList.add("failure");
    }
    document.body.appendChild(popup);
    setTimeout(function(){
            popup.className = popup.className.replace("show", "");
            popup.remove();
            }, 5000);
    return 1;
}


