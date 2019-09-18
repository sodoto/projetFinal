<?php
if (!ISSET($_SESSION))
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Language" content="en-ca">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Page d'accueil</title>
<style>
.switch {
  position: relative;
  display: table-cell;
  width: 48px;
  height: 23px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #33331a;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 17px;
  width: 17px;
  left: 4px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #62B420
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(24px);
  -ms-transform: translateX(24px);
  transform: translateX(24px);
}
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
.slider-label {
  display: table-cell;
  vertical-align: middle; 
  padding-right: 15px;
 
}


</style>

</head>

<body>
<div>
<?php
	include("banner.php");
	//include("menu.php");
	
?>

	<main>
        <article>
            <section>
			 <h1 id="heading1">Voulez-vous aider les autres? dites-nous vos compétences</h1>
			 <p id="par1"><strong>Si pour le moment vous ne pouvez pas aider les autres ne vous inquietez pas, continuez simplement.</strong></p> 
			 <p id="par1"><strong>Si vous changez d'avis plus tard vous pouvez ajouter des competences dans vos préferences</strong></p>
                <form action="competences.php" method="POST" id="register1">
                   
					
					<label class="slider-label">Deplacer des objets </label>
					<label class="switch">
					<input type="checkbox" name="deObj" value="deObj" >
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Peinture(art)</label>
					<label class="switch">
					<input type="checkbox"  name="peintA" value="peintA">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Peinture (murs et objets similaires)</label>
					<label class="switch">
					<input type="checkbox" name="peintO" value="peintO">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Traduire </label>
					<label class="switch">
					<input type="checkbox" name="trad" value="trad">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Nettoyer </label>
					<label class="switch">
					<input type="checkbox" name="nett" value="nett">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Transporter quelque chose</label>
					<label class="switch">
					<input type="checkbox" name="transp" value="transp">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Acompagner</label>
					<label class="switch">
					<input type="checkbox" name="acomp" value="acomp">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Enseigner </label>
					<label class="switch">
					<input type="checkbox" name="ense" value="ense">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Organiser </label>
					<label class="switch">
					<input type="checkbox"name="org" value="org">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Cuisiner </label>
					<label class="switch">
					<input type="checkbox" name="cuis" value="cuis">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Nourrir</label>
					<label class="switch">
					<input type="checkbox" name="nour" value="nour">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Conduire</label>
					<label class="switch">
					<input type="checkbox" name="cond" value="cond">
					<div class="slider round"></div>
					</label>
					<br>
					<label class="slider-label">Réparer quelque chose</label>
					<label class="switch">
					<input type="checkbox" name="rep" value="rep">
					<div class="slider round"></div>
					</label>
					<br>
					
					
                   
                    <button type="submit" name="submit" value="submit" >Enregistrer</button>
                    <button type="reset" name="reset" value="reset"  >Éteindre les boutons</button>

                    
                    <p>
                        <a href="gereBenevolat.php">Continuer</a>
                    </p>
                </form>
            </section>
        </article>
    </main>
	
<?php
	include("footer.php");
?>
</div>
</body>
</html>
