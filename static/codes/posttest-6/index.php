<?php

session_start();
include('./functions.php');

$journals = all("journals");
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
      <div class="row w-100">
        <div class="col col-8">
          <h1>Daftar Jurnal</h1>
        </div>
        <div class="col col-4 flex align-items-center justify-content-end">
          <a href="./create.php" class="btn btn-primary">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Data
          </a>
        </div>
        <div class="col col-12 mt-3">
          <table class="w-100" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Berkas</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($journals as $journal) : ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $journal['title'] ?> (v<?= $journal['version'] ?>)</td>
                  <td><?= $journal['author'] ?></td>
                  <td><a href="<?= $journal['file'] ?>" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-link mr-1"></i>Buka</a></td>
                  <td><?= $journal['date'] ?> </td>
                  <td class="text-center">
                    <a href="./journal-files/index.php?id=<?= $journal['id'] ?>" class="btn btn-primary mr-1">
                      <i class="fa-solid fa-list"></i>
                    </a>
                    <a href="./edit.php?id=<?= $journal['id'] ?>" class="btn btn-primary mr-1">
                      <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a data-id="<?= $journal['id'] ?>" class="btn btn-primary delete-btn">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>


  <footer class="bg-accent">
    <p>Kertas. All right reserved</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '.delete-btn', function() {
        Swal.fire({
          title: 'Apa anda yakin?',
          text: "Datanya bakal hilang, loh!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya!',
          cancelButtonText: 'Gak Jadi!'
        }).then((result) => {
          window.location.href = `./delete.php?id=${$(this).data('id')}`
        })
      })
    });
  </script>
</body>

</html>