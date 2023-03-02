<?php
// echo "<a href='http://localhost:3000/'>Back to frontend</a><br/><br/><br/>"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar sticky-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Navbar text with an inline element
                </span>
            </div>

        </div>
    </nav>
    <?php
    if (isset($_GET['error'])) {
        ?>
        <script type="text/javascript">
            alert("<?php echo $_GET['error'] ?>");
        </script>
        <?php
    }
    ?>
    <h1 id="test">Wazaaaaaaaaaap</h1>
    <br />
    <a href="/test.php">Go to test.php</a>
    <br />
    <br />
    <a href="http://localhost:8081">Go to PHPMYADMIN</a>
    <br />
    <div id="ispis"></div>
    <div
        class="container my-5 text-center d-flex flex-column justify-content-center align-items-center w-50 rounded bg-dark text-white">
        <h1 class="mt-2">MEJL FORMA</h1>
        <form action="http://localhost:8080/obrada.php" method="post">
            <div class="row my-3">
                <div class="col-6">
                    <label for="mejlKa" class="mb-2 form-label">Mejl primaoca:</label>
                    <input type="mail" class="form-control" name="mejlKa" id="mejlKa">
                </div>
                <div class="col-6">
                    <label for="naslovMejl" class="mb-2 form-label">Naslov:</label>
                    <input type="text" class="form-control" name="naslovMejl" id="naslovMejl">
                </div>
            </div>
            <div class="row my-3">
                <label for="sadrzajMejl" class="mb-2 form-label">Sadrzaj (HTML format):</label>
                <textarea class="form-control" name="sadrzajMejl" id="sadrzajMejl" rows="7"></textarea>
            </div>
            <input type="submit" class="btn btn-primary form-control mb-3" value="Posalji mejl" name="posaljiMejl">
        </form>

        <!-- <a href="http://localhost:8080/obrada.php" class="btn btn-primary">Posalji</a> -->
        <?php if (isset($_GET['odgovor'])) { ?>
            <p class="alert alert-info mb-2 text-dark">
                <?php echo $_GET['odgovor'] ?>
            </p>
        <?php } ?>
        <?php if (isset($_GET['greska'])) { ?>
            <p class="alert alert-danger mb-2">
                <?php echo $_GET['greska'] ?>
            </p>
        <?php } ?>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="http://localhost:8080/obrada.php" method="post" class="my-5">
                    <div class="row mb-5 text-center">
                        <h1>FORMA 1</h1>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="">Ime i prezime</label>
                            <input type="text" name="tbImePrezime" class="form-control" />
                        </div>
                        <div class="col-6">
                            <label for="">Email</label>
                            <input type="text" name="tbEmail" class="form-control" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Smer1</label>
                        <input type="checkbox" name="Smer1" value="1">
                        <label for="" class="form-label">Smer2</label>
                        <input type="checkbox" name="Smer2" value="2">
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="" class="form-label">Dan</label>
                            <select name="ddlDan" class="form-select">
                                <option value="0">Dan</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Mesec</label>
                            <select name="ddlMesec" class="form-select">
                                <option value="0">Mesec</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Godina</label>
                            <select name="ddlGodina" class="form-select">
                                <option value="0">Godina</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Napomena</label>
                        <textarea name="taNapomena" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="Prijava" name="btnProvera" class="btn btn-primary form-control" />
                    </div>
                </form>
                <!-- <?php
                // if ($_GET["message"]) {
                //     echo $_GET['message'];
                //     $rezultat = $conn->query("select * from ttable");
                //     $elListe = "";
                //     foreach ($rezultat as $el) {
                //         $elListe .= "<option value='" . $el->id . "'>" . $el->date . "</option>";
                //     }
                
                // }
                ?>
                <select name="test" id="test" class="form-select">
                    <option value=" 0">Izaberite</option>
                    <?php
                    // echo $elListe;
                    ?>
                </select> -->



                <br />
                <hr />
                <br />




                <form class="my-5" action="http://localhost:8080/users.php" method="post">
                    <div class="row mb-4 text-center">
                        <h1>FORMA 2</h1>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="username" class="col-sm-2 col-form-label">Username:</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="col-6">
                            <label for="password" class="col-sm-2 col-form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="form-group row my-3">
                        <input type="submit" value="insert" name="userSubmit"
                            class="btn btn-primary mt-3 form-control" />
                    </div>
                    <div class="row text-center">
                        <?php
                        echo "<p>" . $_GET['insert'] . "</p>";
                        ?>
                    </div>
                    <div class="form-group row">
                        <label for="getUser" class="col-sm-2 col-form-label">Username:</label>
                        <input type="text" name="getUser" class="form-control" id="getUser">
                    </div>
                    <div class="form-group row">
                        <input type="submit" value="get" name="userSubmit" class="btn btn-primary mt-3 form-control" />
                    </div>
                    <div class="row text-center">
                        <?php
                        echo "<p>" . $_GET['get'] . "</p>";
                        ?>
                    </div>
                    <div class="form-group row">
                        <label for="deleteUser" class="col-sm-2 col-form-label">Username:</label>
                        <input type="text" name="deleteUser" class="form-control" id="deleteUser">
                    </div>
                    <div class="form-group row">
                        <input type="submit" value="delete" name="userSubmit"
                            class="btn btn-primary mt-3 form-control" />
                    </div>
                    <div class="row text-center">
                        <?php
                        echo "<p>" . $_GET['delete'] . "</p>";
                        ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="updateUser" class="col-form-label">Username:</label>
                            <input type="text" name="updateUser" class="form-control" id="updateUser">
                        </div>
                        <div class="col-6">
                            <label for="changeTo" class="col-form-label">Change to:</label>
                            <input type="text" name="changeTo" class="form-control" id="changeTo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="submit" value="update" name="userSubmit"
                            class="btn btn-primary mt-3 form-control" />
                    </div>
                    <div class="row text-center">
                        <?php
                        echo "<p>" . $_GET['update'] . "</p>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>