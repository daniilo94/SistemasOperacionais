<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<section id="container">
    <section id="main-content">
        <section class=" wrapper container">
            <div>
                <hr>
                <h3 style="text-align: center">Último valor de compra e venda</h3>
                <br>
                <table id="table_id" class="display" style="    width: 100%;clear: both;
    margin-bottom: 6px !important;
    max-width: none !important;border: 1px solid #ddd;    background-color: transparent;border-spacing: 0;
    border-collapse: collapse;box-sizing: border-box;display: table;">
                    <thead>
                    <tr>
                        <td>Tipo</td>
                        <td>Data</td>
                        <td>Preço</td>
                        <td>Volume</td>
                        <td>ID</td>
                    </tr>
                    </thead>
                </table>
            </div>

            <section>
                <hr>
                <h3 style="text-align: center">Livro de ofertas atualizado</h3>
                <br>
                <h4>Lista das ofertas de venda disponíveis</h4>
                <br>
                <table id="table_id2" class="display" style="    width: 100%;clear: both;
    margin-bottom: 6px !important;
    max-width: none !important;border: 1px solid #ddd;    background-color: transparent;border-spacing: 0;
    border-collapse: collapse;box-sizing: border-box;display: table;">
                    <thead>
                    <tr>
                        <td>Preço</td>
                        <td>Quantidade</td>
                    </tr>
                    </thead>
                </table>
                <hr>
                <h4>Lista das ofertas de compra disponíveis</h4>
                <br>
                <table id="table_id3" class="display" style="    width: 100%;clear: both;
    margin-bottom: 6px !important;
    max-width: none !important;border: 1px solid #ddd;    background-color: transparent;border-spacing: 0;
    border-collapse: collapse;box-sizing: border-box;display: table;">
                    <thead>
                    <tr>
                        <td>Preço</td>
                        <td>Quantidade</td>
                    </tr>
                    </thead>
                </table>
                <p id="order"></p>
                <hr>
            </section>
        </section>
    </section>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

<script>
    var dtable = $('#table_id').DataTable({
        "ajax": {
            "method": "GET",
            "url": "getTrades.php"
        },
        "columns": [
            {"data": "type"},
            {"data": "date"},
            {"data": "price"},
            {"data": "amount"},
            {"data": "tid"}
        ]
    });

    var dtable2 = $('#table_id2').DataTable({
        "ajax": {
            "method": "GET",
            "url": "getOrderbookAsks.php"
        },
        "columns": [
            {"data": "price"},
            {"data": "quantity"}
        ]
    });

    var dtable3 = $('#table_id3').DataTable({
        "ajax": {
            "method": "GET",
            "url": "getOrderbookBids.php"
        },
        "columns": [
            {"data": "price"},
            {"data": "quantity"}
        ]
    });


    setInterval(function () {
        dtable.ajax.reload();
        dtable2.ajax.reload();
        dtable3.ajax.reload();
    }, 1000);
</script>
</body>
</html>