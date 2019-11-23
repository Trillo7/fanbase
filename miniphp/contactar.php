<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/head-tag-contents.php"); ?>
  <script src="https://kit.fontawesome.com/4fd23b04c2.js" crossorigin="anonymous"></script>
</head>
<body>

  <?php include("includes/navigation.php"); ?>


  <main class="container"> 

    <section id="contact" class="section-bg wow fadeInUp">
  
      <div class="section-header mt-5">
        <h2>Contacto</h2>
        <p>Contacta con nuestro equipo de soporte</p>
      </div>


      <div class="row">
        <div class="form col-md-8">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="name">Introduce tu nombre:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Introduce al menos 4 letras" />

              </div>
              <div class="form-group col-md-6">
              <label for="email">Introduce tu email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Correo" data-rule="email" data-msg="Introduce un correo valido" />

              </div>
            </div>
            <div class="form-group">
            <label for="asunto">Introduce el asunto de tu mensaje:</label>
              <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4" data-msg="Introduce al menos 4 letras" />
            </div>
            <div class="form-group">
            <label for="mensaje">Introduce tu mensaje:</label>
              <textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required" data-msg="Introduce su mensaje" placeholder="Mensaje"></textarea>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
          </form>
        </div>
        <div clas="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="./img/gallery/8.jpg" class="card-img-top">
           
            <ul class="list-group list-group-flush">
              <li class="list-group-item"> <h5>Email</h5>
                <p><a href="mailto:info@example.com">fanbase@support.com</a></p></li>
              <li class="list-group-item"><h5>Address</h5>
                <address>Calle Juego de Pelota, 54, 14900 Lucena, Córdoba</address></li>
            </ul>
            
          </div>
          
        </div>
      </div>

    </section>

  </main>


  <?php include("includes/footer.php"); ?>
</body>

</html>