<?php include("templates/header.php"); ?>

<br /><br />
<!-- Formulario Inicio -->
<div class="card" id="cardindexpuestos">
  <div class="content">
    <div class="title">
      <h1 id="Titulo"><strong>Ha ingresado a Kahwasoft<img src="Img/Logo.png" width="40%" height="40%" align="right"></strong></h1>
      <h2 id="Titulo"><strong>Bienvenido Usuario:</strong></h2>
    </div>
    <div class="card-body">
      <strong>
        <p class="col-md-8 fs-2" id="titulo"><?php echo $_SESSION['usuario']; ?></p>
      </strong>
      <h2 id="Titulo"><strong>A su sistema de gestión para la finca cafetera.</strong></h2>
    </div>
  </div>
</div>
<br /><br />
<br /><br />
<!-- Footer -->
<?php include("templates/footer.php"); ?>

<!-- Social Footer -->
<?php include("templates/socfooter.php"); ?>

<!-- Herramienta Accesibilidad -->
<script>
(function(d) {
    var s = d.createElement("script");
    s.setAttribute("data-account", "fFgZ6B1nWP");
    s.setAttribute("src", "https://cdn.userway.org/widget.js");
    s.setAttribute('locale', 'es');
    (d.body || d.head).appendChild(s);
})(document)
</script>