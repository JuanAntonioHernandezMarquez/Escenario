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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <?php include("modules/header.php"); ?>
    <script src="js/three.js"></script>
    <script>
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

        const renderer = new THREE.WebGLRenderer({ alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        const geometry = new THREE.BoxGeometry(10, 10, 10);
        const materials = [
            new THREE.MeshBasicMaterial({ color: 0xff0000 }), // Cara frontal - Rojo
            new THREE.MeshBasicMaterial({ color: 0x00ff00 }), // Cara posterior - Verde
            new THREE.MeshBasicMaterial({ color: 0x0000ff }), // Cara superior - Azul
            new THREE.MeshBasicMaterial({ color: 0xffff00 }), // Cara inferior - Amarillo
            new THREE.MeshBasicMaterial({ color: 0xff00ff }), // Cara derecha - Magenta
            new THREE.MeshBasicMaterial({ color: 0x00ffff })  // Cara izquierda - Cian
        ];
        const cube = new THREE.Mesh(geometry, materials);
        scene.add(cube);

        camera.position.z = 15;

        const keyboardState = {};

        function handleKeyDown(event) {
            keyboardState[event.key] = true;
        }

        function handleKeyUp(event) {
            keyboardState[event.key] = false;
        }

        window.addEventListener('keydown', handleKeyDown);
        window.addEventListener('keyup', handleKeyUp);

        function animate() {
            requestAnimationFrame(animate);

            // Movimiento automático
            cube.rotation.x += 0.01;
            cube.rotation.y += 0.01;

            // Movimiento controlado por teclado
            if (keyboardState['ArrowUp']) {
                cube.position.y += 0.1;
            }
            if (keyboardState['ArrowDown']) {
                cube.position.y -= 0.1;
            }
            if (keyboardState['ArrowLeft']) {
                cube.position.x -= 0.1;
            }
            if (keyboardState['ArrowRight']) {
                cube.position.x += 0.1;
            }

            renderer.render(scene, camera);
        }
        animate();
    </script>
    <?php include("modules/footer.php"); ?>
    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
