    
    <title>Iniciar Sesión</title>
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="../../ccs/styles.css">

<body>
<form action="../../Controler/Pqrs_pqr_controler.php" method="post" enctype="multipart/form-data">
    <section class="login-section">
        <div class="login-container">
            <h2 class="login-title">Iniciar Sesión</h2>
        <input type="hidden" name="tarea" value="incio_usuario">
            <div>
                <label for="nombreUsuario" "></label>
                <input type="text" class="login-input" name = "nombreUsuario" id="nombreUsuario"  placeholder="Usuario">
            </div><br>
            <div>
                <label for="password"></label>
                <input type="password" class="login-input" name = "password" id="password"  placeholder="contraseña">
            </div>
            <br>
            <button class="login-button" type="submit">Iniciar Sesión</button>
        </div>
    </section>
</form>
</body>
