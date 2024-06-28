<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PQRS</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        #tablaContenedor {
            max-width: 100%;
            overflow-x: auto;
        }
        #pqrsPersona thead {
            white-space: nowrap;
        }
    </style>
</head>
            <!-- Estilos personalizados -->
            
    <style>

        .navbar {
            background-color: #004e98;
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

        /* Contenedor principal */
        .container {
            margin-top: 20px;
            background-color: #004e98;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .container_editar {
            margin-top: 20px;
            background-color: #3a6ea5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .containertabla {
            margin-top: 50px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }


            .dropdown:hover .dropdown-menu {
                display: block !important;
            }

            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

            .btn-custom-color {
                background-color: #008000; 
            }
            .btn-custom-color-editar {
                background-color: #FFA500; 
            }
            .btn-custom-color-delete {
                background-color: #FF0000; 
            }

            .custom-input-group {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        .custom-input-group .input-group-text {
            background-color: #f5f5f5;
            border: none;
            border-right: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            padding: 10px;
        }

        .custom-input-group .form-control {
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 10px;

            
        }

    
    h2 {
        background-color: #007bff; 
        color: #fff; 
        padding: 10px; 
        border-radius: 5px; 
    }

  
    hr {
        border: none; 
        height: 2px; 
        background-color: #ccc; 
        margin: 15px 0;
    }

    </style>

</head>
<body>
             <!-- Barra de navegación -->
             <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                        
                <a class="navbar-brand" href="https://proinsalud.co/"><img src="../../img/log.png"  width="100" height="70" alt="Logo"></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Reportes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="generarExcelCompleto.php">Descargar reportes</a></li>
                                    <li><a class="dropdown-item" href="generarReporte.php">Generar reporte</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inicio.php">Inicio</a>
                            </li>
                        <a href="../persona/solicitudPqrs.php" class="btn btn-iniciar-sesion">Salir</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    </div>
                </div>
            </nav>
            <!-- Bootstrap JavaScript y Popper.js -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

            <main>
        
             </main>         
</body>
</html>
