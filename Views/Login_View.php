
<?php

class Login{


	function __construct(){ 
		$this->render();
	}

	function render(){

		include '../Views/Header.php'; //header necesita los strings
	?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Log in</h5>
            <form class="form-signin" action='../Controllers/Login_Controller.php' method='post'>
              <div class="form-label-group">
				<input type="text" id="login" name="login" class="form-control" placeholder="Usuario" required autofocus>
                
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
              </div>
			  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log in</button>

        
          </form>

          <label class="tagRegistrarse">¿No estás registrado?</label>
        <form class="form-signup" action='../Controllers/Register_Controller.php' method='post'>
             <button class="btn btn-lg btn-primary btn-block text-uppercase">Registrarse</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
	<?php
		include '../Views/Footer.php';
	} //fin metodo render

} //fin REGISTER

?>
