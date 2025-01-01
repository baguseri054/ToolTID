<?php
    session_start();
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIMART</title>
    <style> <?php include 'dashboard.css'; ?> </style>
<body>
    <header>
        <div class="Headings">
            <img src="https://github.com/baguseri054/ToolTID/blob/main/udayanamart.png?raw=true" alt="logo_TI_Mart" height="300" width="300">
            <h3>Selamat Datang <?= $_SESSION["username"] ?></h3>
            <form action="dashboard.php" method="POST">
                <button type="submit" name="logout">logout</button>
            </form>
        </div>
    </header>
    <main>
        <section id="pertama">
            <h2>#KamiMelayani</h2>
            <p>Disini kamu bisa melakukan pemesanan, tetapi tunggu info dan batch preorder selanjutnya yah</p>
            <nav>
                <ul>
                    <li><a href="Info_Terkini.php">Informasi Seputar Kampus</a></li>
                    <li><a href="Merch.php">Pemesanan Merch</a></li>
                </ul>
            </nav>
        </section>
        <section id="kedua">
            <h2>#KamiJugaBisa</h2>
             <p>(Coming Soon)</br>Udayana Mart <u>nantinya</u> akan selalu siap 24/7 untuk..</p>
             <nav>
                 <ul>
                    <li><a href="service.php">Service Devicemu!</a></li>
                    <li><a href="needs.php">Lengkapin Keperluanmu!</a></li>
                    <li><a href="print.php">Print Tugasmu!</a></li>
                 </ul>
            </nav>
        </section>
         <section id="ketiga">
            <h3>Tentang Kami</h3>
            <p>Informasi lebih lanjut tentang kami, ada disini!</p>
            <a href="about.php">About</a>


        </section>
    </main>

    <?php include "Layout/footer.html" ?>

        </div>
    </footer>
</body>
</html>