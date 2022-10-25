
<?php
  include('./functions.php');

  if(!isset($_GET['id'])) {
    header("location:./index.php");
  }

  $journal = find("journals", $_GET['id']);

  if(isset($_POST['title'])) {
    update("journals");
    header("location:./index.php");
  }
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayu Setiawan - Posttest 6</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/utility.css">
  <link rel="stylesheet" href="./css/style.css">

  <script src="https://kit.fontawesome.com/298ddad7ce.js" crossorigin="anonymous"></script>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="container row p-1">
      <div class="col col-2 flex align-items-center justify-content-center">
        <img id="logo" src="./images/Kertas-logos_black.png">
      </div>
      <div class="col col-8 text-center">
        <nav class="flex align-items-center justify-content-center">
          <ul class="flex align-items-center justify-content-around">
            <li class="active"><a href="./index.php">Daftar Jurnal</a></li>
          </ul>
        </nav>
      </div>
      <div class="col col-2 flex align-items-center justify-content-center">
        <button id="darkmode-toggle" class="btn btn-primary btn-block">
          <i class="fa-solid fa-sun"></i>
        </button>
      </div>
    </div>
  </header>

  <main id="home-page">
    
    <section id="static" class="container row pt-4 mt-4 pb-4 mb-4">
      <form action="" method="POST">
        <input type="hidden" name="id" required value="<?= $journal['id'] ?>">
        <div class="row w-100">
          <div class="col col-12">
            <h1 class="mb-0 font-light">Ubah Jurnal</h1>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="title">Judul</label>
              </div>
              <div class="col col-9">
                <input type="text" name="title" required value="<?= $journal['title'] ?>">
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="author">Penulis</label>
              </div>
              <div class="col col-9">
                <input type="text" name="author" required value="<?= $journal['author'] ?>">
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="file">Link Berkas</label>
              </div>
              <div class="col col-9">
                <input type="url" name="file" required value="<?= $journal['file'] ?>">
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="version">Versi</label>
              </div>
              <div class="col col-9">
                <input type="number" name="version" required value="<?= $journal['version'] ?>">
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="description">Keterangan</label>
              </div>
              <div class="col col-9">
                <textarea name="description" required rows="10"><?= $journal['description'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="date">Tanggal</label>
              </div>
              <div class="col col-9">
                <input type="date" name="date" required value="<?= $journal['date'] ?>">
              </div>
            </div>
          </div>
          <div class="col col-12 mt-4 text-right">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
      </form>
    </section>
  </main>


  <footer class="bg-accent">
    <p>Kertas. All right reserved</p>
  </footer>
</body>
</html>