<html>
<head>
<title></title>
<style>
    #container {
        background-image: url('/images/locations/<?php echo $location->image_name; ?>');
        background-repeat: no-repeat;
    }

    canvas {
        border-style: solid;
        border-color: black;
        border-width: 1px;
    }
</style>
    <script src="/js/mootools.libs.js"></script>
    <script src="/js/project.js"></script>
    <link rel="stylesheet" type="text/css" href="css/simplegrid.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="fabric.js/dist/fabric.min.js"></script>
</head>
<body>
<div id="top-bar"><a href=# class="myButton" id="popup-open-link">Off</a></div>

<div id="inventory-grid-window" style="display:none">
    <div class="handle-bar">
        <div class="close-button-container"><a class="myButton" href=#>X</a></div>
    </div>

    <div class="grid grid-pad">
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
    </div>
    <div class="grid grid-pad">
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
    </div>
    <div class="grid grid-pad">
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>

        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
        <div class="col-1-4">
            <div class="item-box droppable">

            </div>
        </div>
    </div>
</div>

<div id="container">
<canvas id="viewport" width="800" height="600"></canvas>
</div>
<div id="cursor"></div>
<div class="scene-item" data-image-url="images/Banana-icon.png" style="position:absolute;top:200;left:400px;background-repeat:no-repeat;width:100px;height:100px;background-image:url('images/Banana-icon.png');color:white;text-align:center" id="banana-item">&nbsp;</div>
<div class="scene-item" data-image-url="images/lemon-icon.png" style="position:absolute;top:400;left:600px;background-repeat:no-repeat;width:100px;height:100px;background-image:url('images/lemon-icon.png');color:white;text-align:center" id="lemon-item">&nbsp;</div>

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

                rectangle.on('selected', function () {
                    window.location.href = direction.link;
                });

                canvas.add(rectangle);
                canvas.moveTo(rectangle, 9000 + i);
            })(direction, canvas);


        }
    }

    function getId () {
        var id = window.location.pathname.replace('/', '');
        id.replace('#', '');
        return parseInt(id);
    }
    var sceneItems = $$('.scene-item');
    if (getId() !== 1) {
        sceneItems.setStyle('display', 'none');
    }
    drawDirectionVector();
</script>

</body>
</html>
