<?php
 
$dataPoints = array();
$y = 40;
for($i = 0; $i < 1000; $i++){
	$y += rand(0, 10) - 5; 
	array_push($dataPoints, array("x" => $i, "y" => $y));
}
 
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>PHP Charts & Graphs with Zoom & Pan</title>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", 
            animationEnabled: true,
            zoomEnabled: true,
            title: {
                text: "Try Zooming and Panning"
            },
            data: [{
                type: "area",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();


    }
    </script>
    <script src="js/canvasjs.min.js"></script>
</body>

</html>