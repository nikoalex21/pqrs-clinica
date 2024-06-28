    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PQRS</title>
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
      
        <style>
            .navbar {
                background-color: #007BFF;
                padding: 15px 0;
            }

            .navbar-brand {
                color: #fff;
                font-size: 24px;
                font-weight: bold;
            }

            .navbar-toggler-icon {
                background-color: #fff;
            }

            .navbar-nav .nav-link {
                color: #fff;
                font-weight: bold;
            }

            .btn-iniciar-sesion {
                background-color: #ff5722;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s;
            }

            .btn-iniciar-sesion:hover {
                background-color: #ff4500; 
            }

            
            .container {
                margin-top: 20px;
                background-color: #007BFF;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            }

        </style>
    </head>

    <body>
       
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                    
            <a class="navbar-brand" href="#"><img src="../img/logo_proinsalud.jpg" alt="Logo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Consulta solicitud</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nueva solicitud</a>
                        </li>
                    </ul>
                    <button href="../views/usuario/loginUsuario.php" class="btn btn-iniciar-sesion">Iniciar Sesión</button>
                </div>
            </div>
        </nav>

        

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
