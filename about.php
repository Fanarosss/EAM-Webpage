<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>

<body>
  <!-- grid class containing all items -->
  <div class="grid">
    <div class="logo">
      <a href="index.php"><img src="images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/contact.php">Contact</a>
              </li>
            </ul>
            <div class="mydropdown">
              <button class="dropbtn">Login</button>
              <div class="mydropdown-content">
                <a href="#">Student</a>
                <a href="#">Publisher</a>
                <a href="#">Secretary</a>
                <a href="#">Distributor</a>
                <a href="#">Professor</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
        <li class="breadcrumb-item active">About</li>
      </ol>
      <!-- Item 3 on grid -->
      <div class="timeline" style="background-color:#008cba">

        <div class="timeline-item">
          <div class="timeline-icon">
            <span class="fas fa-sort-numeric-down" style="padding:17px"></span>
          </div>
          <div class="timeline-content">
            <p class="timeline-content-date">2008</h2>
            <p>The ZURB Style Guide is created to help us speed up our work. It’s a handy collection of HTML, CSS and Javascript that we use on every client project. The ideas of ZURB Style Guide evolve over the years and form the basis for a new framework, Foundation.</p>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-icon">
            <span class="fas fa-sort-numeric-down" style="padding:17px"></span>
          </div>
          <div class="timeline-content right">
            <p class="timeline-content-date">2010</h2>
            <p>ZURB style guide was solidified and named Foundation. It is being used internally on all client projects and ZURB sites and apps.</p>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-icon">
            <span class="fas fa-sort-numeric-down" style="padding:17px"></span>
          </div>
          <div class="timeline-content">
            <p class="timeline-content-date">2011</h2>
            <p>
              <a href="http://foundation.zurb.com/sites/docs/v/2.2.1/" target="_blank">Foundation 2.0</a> is released to the public as an open source project! Foundation is the first responsive front-end framework and helps lead the charge for RWD across the web.
            </p>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-icon">
            <span class="fas fa-sort-numeric-down" style="padding:17px"></span>
          </div>
          <div class="timeline-content right">
            <p class="timeline-content-date">2012</h2>
            <p>
              <a href="http://foundation.zurb.com/sites/docs/v/3.2.5/" target="_blank">Foundation 3.0</a> is released! This version comes with Sass and is the first framework to use mixins and Sass partials.
            </p>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-icon">
            <span class="fas fa-check-double" style="padding:17px"></span>
          </div>
          <div class="timeline-content">
            <p class="timeline-content-date">2013 - <span class="timeline-content-month">february</span></p>
            <p>This year saw not one, but three releases to Foundation! <a href="http://foundation.zurb.com/sites/docs/v/4.3.2/index.html" target="_blank">Version 4</a> went <a href="http://zurb.com/word/mobile-first" target="_blank">mobile first</a>, added many new components, and came with a visual update. Our responsive image plugin called <a href="http://foundation.zurb.com/sites/docs/v/4.3.2/components/interchange.html" target="_blank">Interchange</a> was added to Foundation to make sites built with it load even faster.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
