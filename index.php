<?php
?>

<!DOCTYPE html>
<html lang="fr">
<title>Mon site perso</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}

	 /* The Modal (background) */
   .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} 
</style>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
     <form action="login.php">
     <div style="text-align: center;"><div class="container">
        <label for="uname"><b>Nom d'utilisateur : </b></label>
        <input type="text" placeholder="Entrez nom d'utilisateur" name="username" required><br><br>

        <label for="psw"><b>Mot de passe : </b></label>
        <input type="password" placeholder="Entrez mot de passe" name="password" required><br><br>

        <button type="submit">Login</button>
         </div></div>
      </form> 
    </div>
  </div> 

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Accueil</a>
    <?php
    ?>
    <!-- <a href="page1.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Page 1</a> -->
  </div>
</div>

<!-- Header -->
<!-- <header class="w3-container w3-red w3-center" style="padding:128px 16px"> -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Mon site perso</h1>
    <!-- Trigger/Open The Modal -->
  <button id="btnLogin" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Log in</button>

</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
bonjour
  </div>
</div>
</body>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById('btnLogin');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>