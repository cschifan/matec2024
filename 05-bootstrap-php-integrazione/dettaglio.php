<?php
session_start();

if (!isset($_SESSION["utenteCorrente"])) {
    header("Location: login.php");
    exit();
} else {
    $utente=$_SESSION["utenteCorrente"];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Il negozio di prova</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />

    <style>
      .rosso {
        background-color: red;
      }

      .verde {
        background-color: green;
      }

      .blu {
        background-color: blue;
      }

      .giallo {
        background-color: yellow;
      }

      .azzurro {
        background-color: aqua;
      }

      .giustificato {
        text-align: justify;
      }

      .beige {
        background-color: beige;
      }

      .centrato {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row beige">
        <div class="col"><h1 class="text-center">Il mio negozio</h1></div>
      </div>
      <div class="row beige">
        <div class="col-3 offset-9">
            <p>Ciao <?php echo $utente ?> 
                <a href="do_logout.php" class="btn btn-primary">Logout</a>
            </p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-expand-md bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="https://google.it" target="_blank"
                >Claunet</a
              >
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php"
                      >Home</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="prodotti.php">Prodotti</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="pagina3.html"
                      >Pagina 3</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-sm-12">
          <?php
            $id=$_GET["id"]; 
          
            $host = "localhost";
            $username = "root";
            $password = "root";
            $db = "negozio";

            $conn = new mysqli($host, $username, $password, $db);

            $query = "SELECT * FROM prodotti where id=$id;";
            $result = $conn->query($query);

            $ntuple = mysqli_num_rows($result);
            $tupla = $result->fetch_assoc();
            
            if ($ntuple==1) {
              $nomeprodotto = $tupla["nome"];
              $descrprodotto = $tupla["descrizione"];
              $nomefile = $tupla["fileimmagine"];
            }

          ?>
          <h1>Il dettaglio del prodotto</h1>
          <p>Nome: <?php echo $nomeprodotto?></p>
          <p>Descrizione: <?php echo $descrprodotto?></p>
          <div>
            <img src="<?php echo $nomefile ?>" alt="img-fluid img-thumbnail rounded mx-auto d-block">
          </div>
        </div>
        <div class="col-md-3 d-none d-md-block">
          <div class="card mx-auto mb-2" style="width: 12rem">
            <img
              src="https://picsum.photos/200/100?random=1"
              class="card-img-top"
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets
                containing
              </p>
            </div>
          </div>
          <div class="card mx-auto mb-2" style="width: 12rem">
            <img
              src="https://picsum.photos/200/100?random=2"
              class="card-img-top"
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets
                containing
              </p>
            </div>
          </div>
          <div class="card mx-auto mb-2" style="width: 12rem">
            <img
              src="https://picsum.photos/200/100?random=3"
              class="card-img-top"
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets
                containing
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row beige">
        <div class="col"><p class="text-center">Credits ...</p></div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>