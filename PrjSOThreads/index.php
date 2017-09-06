<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<button id="a">Click</button>
<p id="sell"></p><br>
<p id="buy"></p>

<script>
    $("#a").click(function () {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    treatResponse(xhr.responseText);
//                    $("#p").html(xhr.responseText);
//                    data = JSON.parse(xhr.responseText);
//                    console.log(data[0].type);
//                    alert(JSON.stringify(data[0]));
                } else {
                    alert(xhr.status);
                }
            }
        }
        xhr.open("GET", "https://broker.negociecoins.com.br/api/v3/BTCBRL/trades", true);
        xhr.send();
    });

    function treatResponse(response) {
        data = JSON.parse(response);
        lastBuy = null;
        lastSell = null;
        for (var i = 0; i < data.length; i++){
            if (data[i].type == "Buy"){
                lastBuy = data[i];
                break;
            }
        }
        for (var i = 0; i < data.length; i++){
            if (data[i].type == "Sell"){
                lastSell = data[i];
                break;
            }
        }
        $("#sell").html(JSON.stringify(lastSell));
        $("#buy").html(JSON.stringify(lastBuy));
//        console.log(lastBuy);
//        console.log(lastSell);
    }
</script>
</body>
</html>