<?php
include('../functions.php');

if (!isset($_GET['journal_id'])) {
  header("location:../index.php");
}

$journal = find("journals", $_GET['journal_id']);

if(isset($_POST['name'])) {
  // * HANDLE FILE
  $namaFile = $_FILES['file']['name'];
	$ukuranFile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpName = $_FILES['file']['tmp_name'];

	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	$file = uniqid();
	$file .= '.';
	$file .= $ekstensiGambar;

	move_uploaded_file($tmpName, "../storage/$file");
  store("journal_files", [
    "name" => $_POST["name"],
    "journal_id" => $journal['id'],
    "uploaded_at" => $_POST["uploaded_at"],
    "file" => $file,
  ]);
  header("location:./index.php?id={$journal['id']}");
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayu Setiawan - Posttest 7</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href=".../css/utility.css">
  <link rel="stylesheet" href=".../css/style.css">

  <script src="https://kit.fontawesome.com/298ddad7ce.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- HEADER -->
  <header>
    <div class="container row p-1">
      <div class="col col-2 flex align-items-center justify-content-center">
        <img id="logo" src="../images/Kertas-logos_black.png">
      </div>
      <div class="col col-8 text-center">
        <nav class="flex align-items-center justify-content-center">
          <ul class="flex align-items-center justify-content-around">
            <li class="active"><a href="../index.php">Daftar Jurnal</a></li>
          </ul>
        </nav>
      </div>
      <div class="col col-2 flex align-items-center justify-content-center">
        <a href="../auth/logout.php" class="btn btn-primary btn-block">
          Logout
        </a>
      </div>
    </div>
  </header>

  <main id="home-page">

    <section id="static" class="container row pt-4 mt-4 pb-4 mb-4">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row w-100">
          <div class="col col-12">
            <h1 class="mb-0 font-light">Tambah File Jurnal - <?= $journal['title'] ?></h1>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="title">Nama File</label>
              </div>
              <div class="col col-9">
                <input type="text" name="name" required>
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="author">Tgl. Upload</label>
              </div>
              <div class="col col-9">
                <input type="text" name="uploaded_at" readonly value="<?= date('Y-m-d H:i:s') ?>">
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="file">File</label>
              </div>
              <div class="col col-9">
                <input type="file" name="file" required>
              </div>
            </div>
          </div>
          <div class="col col-12 mt-4 text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
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