<?php # Script 19.5 - index.php
//  This is the main page for the site.

//  Set the page_title

$page_title = "Make an Impression!";

//  Include the HTML header:
include('includes/header.html');

?>

<!-- carousel -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/escorial1.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>Spanish Castle Magic</h3>
        <p>The atmosphere in el Escorial is awesome.</p>
      </div>
    </div>

    <div class="item">
      <img src="images/escorial2.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Minstrel In The Gallery</h3>
        <p>Thank you, Minstrel - A night we won't forget.</p>
      </div>
    </div>

    <div class="item">
      <img src="images/escorial4.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        <h3>Picture Me Rollin</h3>
        <p>Even though the traffic was a mess, we had the best time.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- end carousel -->

<h3>Master Painters</h3>
<p><em>We just love arts!</em></p>
<p>With PHP, MySQL and some Bootstrap we have created a fictional entrtaining art gallery with an option of purchase.
  We dont deliver the marchendise, however, your money is well apprecited...</p>

<p>
  Welcome to our site... please use the links above...blah, blah, blah.
</p>

<p>

  N' importe quoi...:
  // The content on this page is introducty text
  // pulled from the database, based upon the
  // selected language:
  // echo $words['intro'];
</p>

<p>
  Now meet our artistic consultants:
</p>

<br />

<div class="row">
  <div class="col-sm-4">
    <p class="text-center"><strong>George W</strong></p><br>
    <a href="#demo" data-toggle="collapse">
      <img class="img-circle person" src="images/bush1.jpg" alt="Random Name">
    </a>
    <div id="demo" class="collapse">
      <p>Bohemian and bonvivan</p>
      <p>Loves long walks on the beach</p>
      <p>Never spoiled his hands with labor in his life</p>
    </div>
  </div>
  <div class="col-sm-4">
    <p class="text-center"><strong>G M Willie</strong></p><br>
    <a href="#demo2" data-toggle="collapse">
      <img class="img-circle person" src="images/willie.jpg" alt="Random Name">
    </a>
    <div id="demo2" class="collapse">
      <p>Hard worker of the brush</p>
      <p>Loves long walks on the beach</p>
      <p>Illegaly i the country</p>
    </div>
  </div>
  <div class="col-sm-4">
    <p class="text-center"><strong>Che G</strong></p><br>
    <a href="#demo3" data-toggle="collapse">
      <img class="img-circle person" src="images/che.jpg" alt="Random Name">
    </a>
    <div id="demo3" class="collapse">
      <p>Revolutionary artist</p>
      <p>Loves cigars and anatomy</p>
      <p>Member since ever</p>
    </div>
  </div>
</div> <!-- end dic class row -->




// Include the HTML footer file:
<?php
include('includes/footer.html');
?>