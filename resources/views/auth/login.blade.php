<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{'assets/estilos.css'}}">
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">LOGIN </h4>
                  </div>
  
                  <form action="{{route('login')}}" method="post">
                    @csrf
                    <p>Iniciar SESION </p>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">correo</label>
                        <input type="email" name="email" id="form2Example11" class="form-control" placeholder="Ingresa correo" />
                    </div>
                    
  
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example22" class="form-control" />
                      <label class="form-label" name="password" for="form2Example22">contraseña</label>
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">No tienes cuenta?</p>
                      <a href="{{route('register')}}" class="btn btn-outline-danger">crear cuenta</a>
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">Tarea completa</h4>
                  <p class="small mb-0">-</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>