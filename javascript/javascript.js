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