<?php

session_start();
include('../functions.php');

if(isset($_POST['email'])) {
  // * CEK AKUN
  $user = query("SELECT * FROM users WHERE email='{$_POST['email']}'");
  if(empty($user)) {
    echo '<script type="text/javascript">alert("Akun tidak terdaftar!!");</script>';
  } else {
    $user = $user[0];
    // * CEK PASSWORD
    $isPassCorrect = password_verify($_POST['password'], $user['password']);
    if(!$isPassCorrect) {
      echo '<script type="text/javascript">alert("Password salah!");</script>';
    } else {
      // * LOGIN
      $_SESSION['is_login'] = true;
      $_SESSION['name'] = $user['name'];
      header("Location: ../journal/index.php");
    }
  }
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
  <link rel="stylesheet" href="../css/utility.css">
  <link rel="stylesheet" href="../css/style.css">

  <script src="https://kit.fontawesome.com/298ddad7ce.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- HEADER -->
  <header>
    <div class="container row p-1">
      <div class="col col-2 flex align-items-center justify-content-center">
        <img id="logo" src="../images/Kertas-logos_black.png">
      </div>
      <div class="col col-10 flex align-items-center justify-content-end">
        <a href="./register.php" class="btn btn-primary">
          Register
        </a>
      </div>
    </div>
  </header>

  <main id="home-page">
    <section id="static" class="container row pt-4 mt-4 pb-4 mb-4">
      <div class="row w-100">
        <div class="col col-12">
          <h1>Login</h1>
        </div>
        <div class="col-12">
          <form action="" method="POST">
            <div class="row w-100">
              <div class="col col-12">
                <div class="form-control row">
                  <div class="col col-3">
                    <label for="title">Email</label>
                  </div>
                  <div class="col col-9">
                    <input type="email" name="email" required>
                  </div>
                </div>
              </div>
              <div class="col col-12">
                <div class="form-control row">
                  <div class="col col-3">
                    <label for="author">Password</label>
                  </div>
                  <div class="col col-9">
                    <input type="password" name="password" required>
                  </div>
                </div>
              </div>
              <div class="col col-12 mt-4 text-right">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </form>
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