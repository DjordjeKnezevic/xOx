<?php
session_start();
if ($_SESSION['Rick'] == "Astley") {
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
// if (!(isset($_SESSION['nizX']) && isset($_SESSION['nizO']) && isset($_SESSION['pisiX']) && isset($_SESSION['endGame']))) {
//     $_SESSION['nizX'] = [];
//     $_SESSION['nizO'] = [];
//     $_SESSION['pisiX'] = true;
//     $_SESSION['endGame'] = false;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>
    <div id="glavni-okvir" class="d-flex">
        <aside class="col-1" id="levi-aside">

        </aside>
        <div class="col-9 d-flex align-items-center flex-column container p-0" id="centralni-okvir">
            <nav class="navbar bg-dark text-white w-100 rounded-bottom py-0" id="navigacija">
                <div class="container">
                    <div class="col-5 d-flex">
                        <a class="text-light" data-bs-toggle="modal" href="#account-modal" role="button"><svg
                                xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        <h1>xOx</h1>
                    </div>
                    <div class="col-5 d-flex flex-row-reverse">
                        <i class="fa-solid fa-x"></i>
                    </div>
                </div>
            </nav>
            <?php require("includes/modal.php"); ?>
            <form id="redirect-form" method="post" action="redirect.php" class="hide">
                <input type="hidden" name="video_id" id="video-id">
            </form>
            <main id="glavni" class="container p-0 d-flex align-items-center justify-content-center">
                <section id="game" class="col-8 p-0 d-flex flex-column align-items-center justify-content-center">
                    <div id="tabla" class="container p-0">
                    <h1 class="text-primary rounded-pill p-3 hide" id="victory-text">PLAYER WON</h1>
                        <div class="row red m-0">
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="a1"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="a2"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="a3"></a>
                        </div>
                        <div class="row red m-0">
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="b1"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="b2"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="b3"></a>
                        </div>
                        <div class="row red m-0">
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="c1"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="c2"></a>
                            <a class="col-4 p-0 polje hov d-flex justify-content-center align-items-center" id="c3"></a>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="arr-clear">Clear</button>
                </section>

                <section id="chat" class="col-4">tekst</section>
            </main>
        </div>
        <aside class="col-3 d-flex flex-column align-items-center" id="desni-aside">
            <form class="d-flex flex-column w-75" role="search">
                <input class="form-control my-1" type="search" placeholder="Search for players" aria-label="Search">
                <button class="btn btn-dark my-1" type="submit">Search</button>
            </form>
        </aside>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>