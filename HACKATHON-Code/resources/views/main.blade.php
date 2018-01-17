<?php session_start();
  if(!(isset($_SESSION['username'])))
  {
    return redirect('login');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Main Page</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="./materialize-css/css/materialize.css"  media="screen,projection"/>
  <link rel="stylesheet" href="./materialize-css/font-awesome-4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style1.css">
  <link rel="stylesheet" href="./css/animate.css">
  <style media="screen">
    body
    {
      font-family: 'Open Sans', sans-serif;
      background-color: #e0e0e0;
    }

    nav
    {
      background:rgba(0,0,0,0.7);
    }

  </style>

</head>
<body>
  <nav class="" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo left white-text">IIITDMJ-Resource Sharing</a>
      <ul class="right hide-on-med-and-down" >
        <li><a href="#" class="white-text"> Hi ! {{ $_SESSION['firstname'] }} </a></li>
        <li><a href="/logout" class="white-text"> Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#" class="white-text">{{ $_SESSION['firstname'] }}</a></li>
        <li><a href="#" class="white-text">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center red-text text-lighten-2 animated jello">Resource Sharing</h1>
        <div class="row center">
          <h5 class="header col s12 black-text animated jello">Applications for effective and upgraded Education System</h5>
        </div>

        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="images/7feccfb2b78334d116f6654c42b84f50.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4 animated zoomIn">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Sharing Of Materials</h5>

            <p class="light">Knowledege parted is knowledege gain.The more you know the more you grow.Here you can share all your study related stuffs.
            This will help students of our college to get the study materials and projects related to their interest and choice.</p>
          </div>
        </div>

        <div class="col s12 m4 animated zoomIn">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Code Exection And Debug</h5>

            <p class="light">Here you can run code of major language without installing on yoour local systems and as it is on intra web of our college
            so the process run faster than exection and work even in fibre cut situation.</p>
          </div>
        </div>

        <div class="col s12 m4 animated zoomIn">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Sharing And Discssion Of projects</h5>

            <p class="light">IIITDMJ-Resource sharing platform will enable you to share you active projects and invite them to collaborate with the team.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>

<hr>
<div class="things">
  <div class="container">
    <div class="section things">
      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Things You Can Do</h4>
            <div class="row">
              <div class="col l4 s12">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/office.jpg">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Notes and Question papers<i class="material-icons right">more_vert</i></span>
                      <p><a href="./notessharing">Click Here</a></p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Notes and Question papers<i class="material-icons right">close</i></span>
                      <p>Here you can find the notes and questions paper of previous exams paper.</p>
                    </div>
                  </div>
                </div>
                <div class="col l4 s12">
                  <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/office.jpg">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Project Sharing<i class="material-icons right">more_vert</i></span>
                        <p><a href="/projects">Click Here</a></p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Project Sharing<i class="material-icons right">close</i></span>
                        <p>Here you can share your project and can find the project of your interset.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col l4 s12">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="images/office.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Debug and help forum<i class="material-icons right">more_vert</i></span>
                          <p><a href="/forum">Click Here</a></p>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">Debug and help forum<i class="material-icons right">close</i></span>
                          <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="row">
                <div class="col l4 s12">
                  <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/office.jpg">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Code Snippets sharing<i class="material-icons right">more_vert</i></span>
                        <p><a href="/upload">Click Here</a></p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Code Snippets sharing<i class="material-icons right">close</i></span>
                        <p>Here you can store useful code snippets which may come handy during contests. Also an option to share code publicly.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col l4 s12">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="images/office.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Code compiles and run<i class="material-icons right">more_vert</i></span>
                          <p><a href="/compiler">Click Here</a></p>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">Code compiles and run<i class="material-icons right">close</i></span>
                          <p>Here you can compile and run code.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col l4 s12">
                      <div class="card">
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="images/office.jpg">
                          </div>
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Live Video<i class="material-icons right">more_vert</i></span>
                            <p><a href="/projects">Click Here</a></p>
                          </div>
                          <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Live Video<i class="material-icons right">close</i></span>
                            <p>Yet to be implemented. Helpful in conducting online sessions and group chats.</p>
                          </div>
                        </div>
                      </div>
                </div>
        </div>
      </div>

    </div>
  </div>
</div>



  <footer class="page-footer grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Resource Sharing Platform</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project that help student to do something out of box.
              Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="www.youtube.com">Youtube</a></li>
            <li><a class="white-text" href="facebook.com/ranjeet.kumaryadav.35">Facebook</a></li>
            <li><a class="white-text" href="twitter.com/shubham_081">Twitter</a></li>
            <li><a class="white-text" href="#!">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-3">
      <div class="container">
      Made by team <a class="brown-text text-lighten-3" href="https://ranjeetscience.net23.net">Anonymous</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
$(document).ready(function(){
$(window).scroll(function() {
 $(".card").each(function(){
   var pos = $(this).offset().top;

   var winTop = $(window).scrollTop();
     if (pos < winTop + 680) {
       $(this).delay( 2800 ).addClass("animated zoomIn");
     }
 });
});
});
</script>
  </body>
</html>
