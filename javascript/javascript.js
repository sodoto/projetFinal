// Afficher les infos concernant la demande
function openNav(demande,json) {
    document.getElementById("myNav").style.height = "100%";
    console.log(json);
    // Parcours de l'objet JSON
    for( i in json ) {
        // Selection du bon id de demande pour l'affichage
        if(demande.dataset.id == json[i].idRequest)
        {
            document.getElementById("description").innerHTML = json[i].skill;
            document.getElementById("title").innerHTML = json[i].title;
            document.getElementById("dateRequest").innerHTML = json[i].dateRequest;
            document.getElementById("dateService").innerHTML = json[i].dateService;
            document.getElementById("location").innerHTML = json[i].location;
            document.getElementById("status").innerHTML = json[i].status;
        }
    }
}

// Fermeture de la fenêtre
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}


// Afficher les informations de contact dans le footer
function loadContact() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("footer").innerHTML = this.responseText;
        
        // Scroll automatique au bas de la page
        var scrollingElement = (document.scrollingElement || document.body);
        scrollingElement.scrollTop = scrollingElement.scrollHeight;
      }
    };
    xhttp.open("GET", "./javascript/ajax_contact.txt", true);
    xhttp.send();
}


// Fonction pour afficher le nom de fichier pour la photo de profil
function changeTextFile(){
    var input = document.querySelector( '.inputfile1' );
    var label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener( 'change', function(e)
    {
        var fileName = '';
        
        fileName = e.target.value.split( '\\' ).pop();

        if( fileName )
        {
            label.querySelector( 'span' ).innerHTML = fileName;
        }
        else
        {
            label.innerHTML = labelVal;
        }
    });
}