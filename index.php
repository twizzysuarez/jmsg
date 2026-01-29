<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Distribuidora JMSG</title>
  <link rel="icon" href="assets/img/favicon_jmsg.png" type="image/x-icon"/>
</head>

<body>
  <div class="container">
    
    <!-- Panel Izquierdo -->
    <div class="left-panel">
      <img src="assets/img/distri.jpeg" alt="Distribuidora JMSG" />
    </div>

    <!-- Panel Derecho -->
    <div class="right-panel">
      <form action="start.php" method="POST" class="login-form">
        <h2>Bienvenido a <span>Distribuidora JMSG</span></h2>
        <p>Ingresa tus datos para continuar</p>

        <input type="text" name="id_usuario" placeholder="Usuario" required />
        <input type="password" name="password" placeholder="Contraseña" required />

        <button type="submit">Iniciar sesión</button>
      </form>
    </div>

  </div>
</body>
</html>

<style>
* {margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif;}
body, html {height:100%; background:#f5f5f5;}
.container {display:flex; height:100vh; animation:fadeIn 1.5s ease-in;}
.left-panel {flex:1; background:#1b1b1b; display:flex; align-items:center; justify-content:center; overflow:hidden;}
.left-panel img {width:100%; height:100%; object-fit:cover; filter:brightness(0.7); animation:zoomIn 1.5s ease;}
.right-panel {flex:1; background:linear-gradient(135deg,#ffffff,#e9f0ff); display:flex; justify-content:center; align-items:center; padding:3rem;}
.login-form {width:100%; max-width:400px; background:#fff; padding:2rem; border-radius:15px; box-shadow:0 15px 30px rgba(0,0,0,0.1); animation:slideIn 1s ease-out; text-align:center;}
.login-form h2 {color:#000; font-size:1.8rem; margin-bottom:10px;}
.login-form h2 span {color:#000;}
.login-form p {color:#555; font-size:.95rem; margin-bottom:20px;}
.login-form input {width:100%; padding:12px; margin:10px 0; border:none; border-radius:8px; background:#f0f0f0; font-size:1rem;}
.login-form input:focus {outline:none; background:#e0e7ff; transition:.3s;}
.login-form button {width:100%; padding:12px; background:#000; color:#fff; font-size:1rem; border:none; border-radius:8px; cursor:pointer; transition:.3s;}
.login-form button:hover {background:#333;}
@keyframes fadeIn {from{opacity:0} to{opacity:1}}
@keyframes zoomIn {from{transform:scale(1.1); opacity:0} to{transform:scale(1); opacity:1}}
@keyframes slideIn {from{transform:translateY(50px); opacity:0} to{transform:translateY(0); opacity:1}}
@media(max-width:900px){.container{flex-direction:column; height:auto;} .left-panel{height:45vh;} .right-panel{height:auto; padding:2rem;} .login-form{max-width:90%;}}
@media(max-width:480px){.login-form{padding:1.5rem;} .login-form h2{font-size:1.5rem;} .left-panel{height:35vh;}}
</style>
