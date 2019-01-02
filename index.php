<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
</head>

<style>

.logo {
    float: left;
}
.bs_item1 {
    float: left;
    margin-top: 71.62px;
}
.bs_item2 {
    float: left;
    margin-top: 70;
}
.bs_item3 {
    float: left;
    margin-top: 70;
    margin-left: 191px;
}
.grid > div {
  display:grid;
  padding: 1em;
  margin-bottom: 20px;
}
.bs-grid > div {
  display:grid;
  margin-bottom: 20px;
}

.button-row{
  font-size: large;
  grid-template-columns: 25% 25% 25% 25%
}
.myButton{
    background:url(./images/but.png) no-repeat;
    cursor:pointer;
    border:none;
    width:200px;
    height:200px;

  }
  .myButton:active {
    background:url(./images/but.png) no-repeat;
    background-color:grey;
  }
.nav-item {
  margin-left: 40px;
  font-size: 110%
}
</style>

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
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Announcements<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="jumbotron">
          <h1 class="display-3">Book distribution!</h1>
          <p class="lead">Now with eudoxus book distribution at universities became easy.</p>
          <hr class="my-4">
          <p>Appropriate management and fast distribution throughout greece.</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
        </div>
      </div>
      <!-- Item 3 on grid -->
      <h2>Are you?</h2>
      <div class="button-row">
          <input class="myButton" type="submit" value="Student">
          <input class="myButton" type="submit" value="Publisher">
          <input class="myButton" type="submit" value="Secretary">
          <input class="myButton" type="submit" value="Professor">
      </div>
    </div>
  </div>
</body>
</html>
