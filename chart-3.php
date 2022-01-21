<!DOCTYPE HTML>
<html>

<head>
    <title>PHP Charts & Graphs from JSON Data Using AJAX</title>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    <script>
    window.onload = function() {

        var dataPoints = [];

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            zoomEnabled: true,
            title: {
                text: "Bitcoin Price - 2017"
            },
            axisY: {
                title: "Price in USD",
                titleFontSize: 24,
                prefix: "$"
            },
            data: [{
                type: "line",
                yValueFormatString: "$#,##0.00",
                dataPoints: dataPoints
            }]
        });

        function addData(data) {
            var dps = data.price_usd;
            for (var i = 0; i < dps.length; i++) {
                dataPoints.push({
                    x: new Date(dps[i][0]),
                    y: dps[i][1]
                });
            }
            chart.render();
        }

        $.getJSON("json/bitcoin-price.json", addData);

    }
    </script>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/canvasjs.min.js"></script>
</body>

</html>