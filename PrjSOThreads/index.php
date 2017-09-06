<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<button id="a">Click</button>
<section style="width: 45%; float: left">
    <div>
        <hr>
        Venda
        <p id="sell"></p>
        <hr>
        Compra
        <p id="buy"></p>
    </div>
</section>
<section style="width: 45%; float: right;">
    <hr>
    Livro de ofertas
    <p id="order"></p>
    <hr>
</section>


<script>

    var x = 1;

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
        if ($("#sell").html() != JSON.stringify(lastSell))
            console.log("sell diferente " + x++);
        $("#sell").html(JSON.stringify(lastSell));

        if ($("#buy").html() != JSON.stringify(lastBuy))
            console.log("buy diferente " + x++);
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
                    if ($("#order").html() != xhr.responseText)
                        console.log("order diferente " + x++);
//                    $("#order").html(b);
                } else {
                    alert(xhr.status);
                }
            }
        }
        xhr.open("GET", "https://broker.negociecoins.com.br/api/v3/BTCBRL/orderbook", true);
        xhr.send();
    }
    setInterval(function () {
        pesquisarSellBuy();
    }, 1000);
    setInterval(function () {
        pesquisarOrder();
    }, 1000);

</script>
</body>
</html>