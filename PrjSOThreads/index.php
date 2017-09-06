<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<button id="a">Click</button>
<div>
    <hr>
    Venda
    <p id="sell"></p>
    <hr>
    Compra
    <p id="buy"></p>
    <hr>
    Livro de ofertas
    <p id="order"></p>
    <hr>
</div>

<script>

    $("#a").click(function () {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    treatResponse(xhr.responseText);
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
        for (var i = 0; i < data.length; i++) {
            if (data[i].type == "Buy") {
                lastBuy = data[i];
                break;
            }
        }
        for (var i = 0; i < data.length; i++) {
            if (data[i].type == "Sell") {
                lastSell = data[i];
                break;
            }
        }
        $("#sell").html(JSON.stringify(lastSell));
        $("#buy").html(JSON.stringify(lastBuy));
    }

    function pesquisarSellBuy() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    treatResponse(xhr.responseText);
                } else {
                    alert(xhr.status);
                }
            }
        }
        xhr.open("GET", "https://broker.negociecoins.com.br/api/v3/BTCBRL/trades", true);
        xhr.send();
    }

    function pesquisarOrder() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    $("#order").html(xhr.responseText);
                    var b = xhr.responseText.replace(",", "\n");
                    console.log(b);
//                    $("#order").html(b);
                } else {
                    alert(xhr.status);
                }
            }
        }
        xhr.open("GET", "https://broker.negociecoins.com.br/api/v3/BTCBRL/orderbook", true);
        xhr.send();
    }
    setInterval(function (){pesquisarSellBuy();}, 1000);
    setInterval(function (){pesquisarOrder();}, 1000);

</script>
</body>
</html>