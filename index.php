<?php
// Manejar la aceptación de cookies
if (isset($_POST['accept_cookies'])) {
    setcookie('cookies_accepted', 'true', time() + (86400 * 30), "/"); // 86400 = 1 día
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestor de Empleados Workdesk</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css2/creative.min.css" rel="stylesheet">

   <!-- Estilos para el mensaje de aceptación de cookies -->
  <style>
      .cookie-alert {
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          background: #000;
          color: #fff;
          text-align: center;
          padding: 20px;
          z-index: 1000;
          font-family:Merriweather,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
          font-size: 0.9rem;
          
      }
      .cookie-alert button {
          margin-left: 20px;
          padding: 10px 20px;
          background: #007bff;
          border: none;
          color: #fff;
          cursor: pointer;
          font-family:Merriweather,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
          font-size: .9rem;
          
      }
  </style>

  </head>

<body id="page-top">

    <!-- PHP para manejar la aceptación de cookies -->
  <?php
  if (!isset($_COOKIE['cookies_accepted'])) {
      echo '<div class="cookie-alert">
          Este sitio web utiliza cookies para mejorar su experiencia. Al continuar navegando, acepta nuestro uso de cookies.
          <form method="POST" action="" style="display: inline;">
            <button type="submit" name="accept_cookies">Aceptar</button>
          </form>
      </div>';
  }
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Workdesk</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Galería</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="admin/admin_login.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Workdesk </h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Aplicación web integral que gestiona todo lo relacionado con los empleados y el proceso de flujo de trabajo de la empresa de forma sistemática.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Descubre más</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Descubre los beneficios de usar Workdesk</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Workdesk ayuda a gerentes y empleados a trabajar juntos y monitorear, gestionar y utilizar eficientemente las horas de trabajo para un mejor crecimiento empresarial. </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">¡Empieza ahora!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Nuestros servicios</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Robusta</h3>
            <p class="text-muted mb-0">Workdesk se revisa regularmente para mantenerla libre de errores</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Escalable</h3>
            <p class="text-muted mb-0">La app se actualiza constantemente para garantizar un rendimiento óptimo.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Lista para usar</h3>
            <p class="text-muted mb-0">Workdesk está lista para usar desde el momento que la descargas.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Código abierto</h3>
            <p class="text-muted mb-0">Somos unos apasionados del open source y el desarrollo de código sin frameworks.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers1.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Intuitiva
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers2.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Robusta
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers3.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Eficaz
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers4.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Colaborativa
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers5.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Flexible
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img2/portfolio/fullsize/workers6.jpg">
            <img class="img-fluid" src="img2/portfolio/thumbnails/workers6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Workdesk
              </div>
              <div class="project-name">
                Escalable
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">¡Descarga una demo gratuita!</h2>
      <a class="btn btn-light btn-xl" href="https://github.com" target="_blank">Descargar ahora</a>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Ponte en contacto con nosotros</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">¿Listo para empezar a disfrutar de Workdesk? ¡Llámanos o envíanos un correo electrónico y te responderemos lo antes posible!</p>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+34 600 123 456</div>
        </div> -->
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <a href="tel:+34600123456">
            <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
            <div>+34 600 123 456</div>
          </a>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@workdesk.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2024 - Natalie Pilkington Gonzalez</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
