<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
    <title>Tarte de la vie</title>
    <style>
        *,*:after,*:before{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        html,body{
            height:100vh;
            width:100vw;
        }
        #contenedor_carga{
            background-color:rgba(250,240,245,0.9);
            height:100%;
            width:100%;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            transition: all 1s ease;
        }
        #carga{
            border:15px solid #ccc;
            border-top-color: #f4266a;
            border-top-style: groove;
            height:100px;
            width:100px;
            border-radius:100%;
            animation: girar 1s linear infinite;
        }
        h1{
            color:#f4266a;
        }
        @keyframes girar{
            from{transform:rotate(0deg);}
            to{transform:rotate(360deg);}
        }
    </style>
</head>
<body>
    <div id="contenedor_carga">
        <div id="carga"></div>
        <h1>¡Hasta Luego! &#x1F60A;</h1>
    </div>
    <script>
        (async function cerrar(){
        //console.log(event)
        const data = new FormData(document.getElementById('formulario'));
        const sesion = await fetch('./ssesion.php').catch(function() {
            console.log("error");
        });
        location.href ="./index.php"
        })();
    </script>
</body>
</html>
