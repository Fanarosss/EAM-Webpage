<?php
   include('../src/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="http://localhost/images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
  <!-- grid class containing all items -->
  <div class="bs1-grid">
    <div class="logo">
      <a href="http://localhost/index.php"><img src="http://localhost/images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/contact.php">Contact</a>
              </li>
            </ul>
            <a href="http://localhost/general/logout.php">
              <button class="dropbtn">Logout</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/publisher/publisher_home.php">Publisher</a></li>
          <li class="breadcrumb-item active">Manual</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_book_man.php">Book Management</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_courier.php">Courier Service</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/publisher/publisher_manual.php">Manual</a>
      </li>
    </ul>
    <div class="bs-item3">
      <div class="jumbotron2">
        <h1 class="display-3" style="text-align:center">Instructions For Publishers</h1>
        <div class="halfsplit">
          <div class="spliter1">
            <hr class="my-4">
            <p class="lead"><b>General instructions:</b></p>
            <hr class="my-2">
            <p class="lead"><i>Index:</i></p>
            <p> In the main page of Eudoxus we welcome you to our site! We are glad for your support and we are here to make your work easier
            and more efficient. The "Learn More" button redirects you to a new page where you can learn more about us and our services.</p>
            <hr class="my-1">
            <p class="lead"><i>Announcements:</i></p>
            <p> Here you can find every new info or change that Eudoxus wants to share with you. You can get informed about our schedules,
            our rules and everything that has to do with book distribution.</p>
            <hr class="my-1">
            <p class="lead"><i>Book Database:</i></p>
            <p> This page is a search engine where you can find any available book in Eudoxus main database. Every detail of the book, such as title,
            authors, publications, ISBN and register ID can be searched and all the results will be presented below accordingly.</p>
            <hr class="my-1">
            <p class="lead"><i>Studies:</i></p>
            <p> This page is another search engine where you can browse different universities and departments and see their studies schedule.
            Every available course comes with its details, like professor, period and semester as well as its corresponding books. Again,
            for every available book there are all the related elements (Title, Authors, Publications, ISBN, Book ID, Pages, Dimensions, Front Page).</p>
            <hr class="my-1">
            <p class="lead"><i>Contact:</i></p>
            <p> In this page there is a form where you can write your comments and remarks or even select a file and send it to our communication center.
            We will take into considation your thoughts and consults and we will respond to it. Furthermore, there are our contact details, so that you
            can even call us if you will. Informative files can also be found in our communication material.</p>
            <hr class="my-1">
          </div>
          <div class="spliter2" style="padding-left: 2em;">
            <hr class="my-4">
            <p class="lead"><b>Personal instructions:</b></p>
            <hr class="my-2">
            <p class="lead"><i>Home:</i></p>
            <p>Publisher's Home Page presents all registration info which consists of Full Name, Username, Address, E-mail, Phone and Registration Date.
            Below those characteristics there is a "Settings" button, where you can change your Password, Address, E-mail and Phone. All other info
            is handled strictly by us and can only be changed in certain occasions after personal request. Moreover, in the right side of the page
            there is a table where you can keep track of your collaboration with Eudoxus and choose whether or not to collaborate with Eudoxus this year.</p>
            <hr class="my-1">
            <p class="lead"><i>Book Management:</i></p>
            <p>This is where you will find all the books that you have registered in Eudoxus database. Every book's info is presented in the table
            under the column with the appropriate header (ID, Title, Author, ISBN, Pages, Dimensions, Costing). In the right column with title "Actions"
            there are two buttons, where you can "Edit" or "Delete" this precise book. There is, also, a search bar so as to find certain books by ID, Title,
            Author and ISBN. In the upper side of the table there is a button named "Add Book" where the process of registering a book begins.
            The first step of the process is ISBN check in order to prevent registering an already registered book. In the second step is where you have to
            add all the necessary info (ID, Title, Author, ISBN, Pages, Dimensions, Costing). After this form is completed correctly, you can proceed in the
            third step, where you can upload files for your book (Front Page, Back Page, Contents, Extract). Finally, when everything is done, you proceed in
            fourth and final step where you can see a review of your book and decide whether you want to add it or not. Every change in books (Add, Edit, Delete)
            leads to Book Management with the equivalent message to inform you about the success of your action.</p>
            <hr class="my-1">
            <p class="lead"><i>Courier Service:</i></p>
            <p>Under Construction</p>
            <hr class="my-1">
            <p class="lead"><i>FAQ:</i></p>
            <p>Frequently Asked Questions and their answers can be found here to help you with your experience in the site of Eudoxus. Every box corresponds
            to a single question. If you are not able to find your answer in this section, you can always contact us throught contact form which is available
            in the Navigation Bar under the title of "Contact".</p>
            <hr class="my-1">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
