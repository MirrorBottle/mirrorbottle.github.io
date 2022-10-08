<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayu Setiawan - Posttest 4</title>
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
            <li class="active"><a href="./index.html">Beranda</a></li>
            <li><a href="./about.html">Tentang</a></li>
            <li><a href="./index.html">Jurnal</a></li>
          </ul>
        </nav>
      </div>
      <div class="col col-2 flex align-items-center justify-content-center">
        <a href="" class="btn btn-primary btn-block mr-2">Daftar</a>
        <a href="" class="btn btn-outline-primary btn-block mr-2">Masuk</a>
        <button id="darkmode-toggle" class="btn btn-primary btn-block">
          <i class="fa-solid fa-sun"></i>
        </button>
      </div>
    </div>
  </header>

  <main id="home-page">
    
    <section id="static" class="container row pt-4 mt-4 pb-4 mb-4">
      <form action="./preview.php" method="post">
        <div class="row w-100">
          <div class="col col-12">
            <h1 class="mb-0 font-light">Buat Jurnal</h1>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="name">Judul</label>
              </div>
              <div class="col col-9">
                <input type="text" name="name" required>
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="name">Versi</label>
              </div>
              <div class="col col-9">
                <input type="number" name="version" required>
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="name">Keterangan</label>
              </div>
              <div class="col col-9">
                <textarea name="description" required rows="10"></textarea>
              </div>
            </div>
          </div>
          <div class="col col-12">
            <div class="form-control row">
              <div class="col col-3">
                <label for="name">Tanggal</label>
              </div>
              <div class="col col-9">
                <input type="date" name="date" required>
              </div>
            </div>
          </div>
          <div class="col col-12 mt-4 text-right">
            <button type="submit" class="btn btn-primary">Preview</button>
          </div>
        </div>
      </form>
    </section>
  </main>


  <footer class="bg-accent">
    <p>Kertas. All right reserved</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {

      const darkmodeToggle = document.getElementById('darkmode-toggle')
      darkmodeToggle.addEventListener('click', function() {
        const theme = $('html').attr('data-theme');
        if(theme == 'light') {
          // * CHANGE TO DARK
          $('html').css({'filter': 'invert(1)'})

          $('#darkmode-toggle i').removeClass('fa-solid fa-sun');
          $('#darkmode-toggle i').addClass('fa-solid fa-moon');

          $('.card').css({'border-radius': '20px'})
          $('.bg-accent').css({'background': '#ddd', 'color': '#000'})
          $('html').attr('data-theme', 'dark');
        } else {
          // * CHANGE TO LIGHT
          $('html').removeAttr('style');
          $('.card').removeAttr('style');
          $('.bg-accent').removeAttr('style');

          $('#darkmode-toggle i').removeClass('fa-solid fa-moon');
          $('#darkmode-toggle i').addClass('fa-solid fa-sun');

          $('html').attr('data-theme', 'light')
        }
      });

      $('#upload-btn').click(function() {
        Swal.fire({
          title: 'Berkasmu sudah diupload, dengan sulap!',
          width: 600,
          padding: '3em',
          color: '#716add',
          backdrop: `
            rgba(0,0,123,0.4)
            url("https://sweetalert2.github.io/images/nyan-cat.gif")
            left top
            no-repeat
          `
        })
      })

    });
    
  </script>
</body>
</html>