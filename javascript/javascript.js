function openNav(lien,json) {
    document.getElementById("myNav").style.height = "100%";
    // console.log(obj.idRequest);
    // console.log(lien.dataset.id);
    for( i in json ) {
        if(lien.dataset.id == json[i].idRequest)
        {
            document.getElementById("description").innerHTML = json[i].skill;
            document.getElementById("title").innerHTML = json[i].title;
            document.getElementById("dateRequest").innerHTML = json[i].dateRequest;
            document.getElementById("dateService").innerHTML = json[i].dateService;
            document.getElementById("location").innerHTML = json[i].location;
            document.getElementById("status").innerHTML = json[i].status;
        }
        
    }
    // var objj = document.getElementById("salut")
    // console.log(objj.dataset.title);
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}

function loadContact() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("footer").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "./javascript/ajax_contact.txt", true);
    xhttp.send();
}