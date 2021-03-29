<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css.css">

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <title>Home</title>
  </head>
  <body>
  <div class="container-fluid">
  <div class="row">
  <div class="col">
  <div class="text-center" style="margin-bottom:0">
  <img src="x4.png" alt="Logo" width="20%" class="larghezza">
</div></div>
  </div>
  <div class="row"  style="margin-bottom:30px;">
  <div class="col">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Xstimate</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nuovo Preventivo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Prodotti</a>
          </li>
        </ul>
        <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="search" placeholder="Cerca"  aria-label="Cerca">
          <button class="btn btn-outline-light" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </nav>
  <!--
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Xstimate</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nuovo preventivo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Prodotti</a>
      </li>    
    </ul>
  </div>  
</nav> -->
  </div>
  </div>

<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dedalus";
        
       
        $conn = new mysqli($servername, $username, $password, $dbname);
       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
              $c=$_GET["valore"];
        
        $sql = "SELECT Cod_preventivo, Cognome, Prezzo_tot, Data_Scadenza FROM cliente, preventivo WHERE "."\"$c\""."= Cognome"." AND cod_clienti = cod_cliente";
       
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            
            $i=0;
           
            
            echo "<div class=\"row\">";         
            while ($row = $result->fetch_assoc()) {
                  echo "<div class=\"col-md-3\">";
                  echo "<div id=\"id1\" style=\"margin-bottom:10px;\" class=\"border border-5 border-dark rounded\">";
                  $i++;
                  echo strtoupper("<b class=\"c1\">". "<span>Preventivo </span>". $row["Cognome"]. "</b> <br>");
                    echo "Prezzo totale: ".$row["Prezzo_tot"]."€";
                    $data1= $row["Data_Scadenza"];
                    echo "<br>"."Data di scadenza: ";
                    $date=date_create($row["Data_Scadenza"]);
                    echo date_format($date,"d/m/Y");
                   
                    $data = date("Y-m-d");
                    for($z=0; $z<10;$z++){
                      echo "<br>";
                    }
                    if ($data>$data1){
                      echo "<span style=\"margin-left:1px;\" class=\"badge bg-danger\">Scaduto</span>";
                    }
                     else {
                      echo "<span style=\"margin-left:1px;\" class=\"badge bg-success\">Valido</span>";
                     }
                   /* echo "<span> id: " . $row["Cod_preventivo"] . " - Name: " .
                          $row["Cognome"] . " " . $row["Prezzo_tot"] . "<br> </span>"; */
                          echo "</div>";
                    echo "</div>";
                    if($i==4){
                      $i=0;
                      echo "</div>";
                      echo " <div class=\"row\">";
                    }
                      
              //  echo "id: " . $row["Cod_preventivo"] . " - Name: " .
              //      $row["Cognome"] . " " . $row["Prezzo_tot"] . "<br>";
            }
            echo "</div>";
        } else {

            echo "0 results";
        }
        $conn->close();

  ?>

