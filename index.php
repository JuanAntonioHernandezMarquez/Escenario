<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escena con Modelado 3D</title>
    <style>
        body {
            margin: 0;
        }
    </style>
</head>

<body>
    <?php include("modules/header.php"); ?> 
    <script src="js/three.js"></script>
    <script src="js/ObjectLoader.js"></script> <!-- Se requiere OBJLoader.js para cargar el modelo OBJ -->
    <script>
     
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

        const renderer = new THREE.WebGLRenderer({ alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Creamos un cargador para cargar el modelo OBJ
        const loader = new THREE.OBJLoader();

        let object; // Variable para almacenar el modelo OBJ

        loader.load('obj/Asrock.obj', function (obj) {
            object = obj;
            scene.add(object);
        });

        camera.position.z = 15;

        // Creamos un objeto para almacenar el estado del teclado
        const keyboardState = {};

        // Función para manejar los eventos de teclado
        function handleKeyDown(event) {
            keyboardState[event.key] = true;
        }

        function handleKeyUp(event) {
            keyboardState[event.key] = false;
        }

        // Asociamos los eventos de teclado a las funciones
        window.addEventListener('keydown', handleKeyDown);
        window.addEventListener('keyup', handleKeyUp);

        function animate() {
            requestAnimationFrame(animate);

            // Realizamos las transformaciones o animaciones necesarias
            // en el modelo cargado
            if (keyboardState['ArrowUp']) {
                object.rotation.x -= 0.01;
            }
            if (keyboardState['ArrowDown']) {
                object.rotation.x += 0.01;
            }
            if (keyboardState['ArrowLeft']) {
                object.rotation.y -= 0.01;
            }
            if (keyboardState['ArrowRight']) {
                object.rotation.y += 0.01;
            }

            renderer.render(scene, camera);
        }
        animate();
    </script>
     <?php include("modules/footer.php"); ?> 
</body>

</html>

   

   
   
  