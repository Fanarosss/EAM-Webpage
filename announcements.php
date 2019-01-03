<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Announcements</title>
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
  grid-template-columns: 20% 20% 20% 20% 20%
}
.myButton{
    background:url(./images/but.png) no-repeat;
    cursor:pointer;
    border:none;
    width:200px;
    height:200px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.myButton:hover {
    background:url(./images/but.png) no-repeat;
    background-color: grey;
    color: white;
}
.myButton:active {
    background:url(./images/but.png) no-repeat;
    background-color:grey;
}
.nav-item {
  margin-right: 50px;
  font-size: 120%
}
.mydropdown {
  position: relative;
  display: inline-block;
}
.dropbtn {
  background-color: #9FD3DF;
  color: white;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 30px;
  padding-right: 30px;
  font-size: 14px;
  border: none;
  cursor: pointer;
}
.mydropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 60px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 10000;
}
.mydropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.mydropdown-content a:hover {
  background-color: #A9B6B9;
  -webkit-transition-duration: 0.2s; /* Safari */
  transition-duration: 0.2s;
}
.mydropdown:hover .mydropdown-content {
  display: block;
}
.dropdown:hover .dropbtn {
  background-color: #grey;
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
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/announcements.php">Announcements</a>
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
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Announcements</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="list-group">
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
