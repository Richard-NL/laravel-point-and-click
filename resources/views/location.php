<html>
<head>
<title></title>
<style>
    #container {
        background-image: url('/images/<?php echo $location->image_name; ?>');
        background-repeat: no-repeat;
    }

    canvas {
        border-style: solid;
        border-color: black;
        border-width: 1px;
    }
</style>
    <script src="fabric.js/dist/fabric.min.js"></script>
</head>
<body>
<div id="container">
<canvas id="viewport" width="1024" height="800"></canvas>
</div>
<div id="cursor"></div>

<script>
    var directions = <?php echo $directions; ?>;

    function drawDirectionVector() {

        var canvas = new fabric.Canvas('viewport');

        for (var i = 0; i < directions.length; i++) {
            var direction = directions[i];

            (function(direction, canvas) {

                var width = direction.bottomRight.x - direction.topLeft.x,
                    height = direction.bottomRight.y - direction.topLeft.y;

                var rectangle = new fabric.Rect({
                    left:  direction.topLeft.x,
                    top: direction.topLeft.y,
                    width: width,
                    height: height,
                    lockMovementX: true,
                    lockMovementY: true,
                    lockRotation: true,
                    lockScalingX: true,
                    lockScalingY: true,
                    opacity: 0.5
                });

//                canvas.on('mouse:move', function ( event ) {
//                    var cursor = document.getElementById('cursor');
//                    //console.log(cursor);
//
//                    if (event.target && event.target.height === height && event.target.left === direction.topLeft.x && event.target.top === direction.topLeft.y) {
//                        console.log(direction.description);
//                        cursor.innerHTML = direction.description;
//                    } else {
//                        console.log('Niets');
//                        cursor.innerHTML = 'Niets';
//                    }
//                });

                rectangle.on('selected', function () {
                    window.location.href = direction.link;
                });

                canvas.add(rectangle);
                canvas.moveTo(rectangle, 9000 + i);
            })(direction, canvas);


        }
    }
    drawDirectionVector();
</script>
</body>
</html>
