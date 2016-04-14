<div class="row">
    <div class="list-group col-md-4">
        <a class="list-group-item">
            <img width="100px" height="100px" src="{curent_player_avatar}" />
            <h1 style="display: inline;">Game Dashboard</h1>
        </a>
        <a class="list-group-item active">
            <h4 class="list-group-item-heading">
                {current_player_username}
            </h4>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">
                Current Cash
            </h4>
            <p class="list-group-item-text">
                {current_player_cash} peanut
            </p>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">
                Equity
            </h4>
            <p class="list-group-item-text">
                {current_player_equity} peanut
            </p>
        </a>
    </div>
    <div class="list-group col-md-4">
        <a class="list-group-item" style="padding-top: 70px;">
            <h1 id="game-state" style="display: inline;">Game State: </h1>
        </a>
        <a class="list-group-item active">
            <h4 class="list-group-item-heading">
                Round
            </h4>
            <p id="round" class="list-group-item-text">

            </p>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">
                Countdown
            </h4>
            <p id="countdown" class="list-group-item-text">

            </p>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">
                Description
            </h4>
            <p id="desc" class="list-group-item-text">

            </p>
        </a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <h1 id="message-label"></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2>Buy Stocks</h2>
        <br/>
        <h3 id="buy-message" style="color: red;"></h3>
        <div class="table-responsive">
            <table id="buy-stocks-table" class="table">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Value</th>
                    <th>Quantity</th>
                </tr>
                {stocks}
                <tr>
                    <td><a href="/stock/stock/{code}">{code}</a></td>
                    <td><a href="/stock/stock/{code}">{name}</a></td>
                    <td><a href="/stock/stock/{code}">{category}</a></td>
                    <td><a href="/stock/stock/{code}">{value}</a>
                    <td width="150px"><input type="number" value="0"/></td>
                </tr>
                {/stocks}
            </table>
        </div>
    </div
    <br>
    <div class="col-md-6">
        <h2>Sell Stocks</h2>
        <div class="table-responsive">
            <table id="sell-stocks-table" class="table">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Value</th>
                    <th>Quantity</th>
                </tr>
                {my_stocks}
                <tr>
                    <td><a href="/stock/stock/{code}">{code}</a> </td>
                    <td><a href="/stock/stock/{code}">{name}</a> </td>
                    <td><a href="/stock/stock/{code}">{category}</a> </td>
                    <td><a href="/stock/stock/{code}">{value}</a> </td>
                    <td width="150px"><input type="number" value="0"/></td>
                </tr>
                {/my_stocks}
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <button style="min-width:100px" class="btn btn-success pull-right" onclick="buyStocks()">Buy</button>
    </div>
    <div class="col-md-6">
        <button style="min-width:100px" class="btn btn-danger pull-right" onclick="sellStocks()">Sell</button>
    </div>
</div>
<br>
<div class="row">
    <h2>Players</h2>
    <div class="table-responsive">
        <table id="players-table" class="table">
            <tr>
                <th>Player</th>
                <th>Username</th>
                <th>Cash</th>
                <th>Delete</th>
            </tr>
        </table>
    </div>
</div>
<script>
    function buyStocks() {
        $("#buy-stocks-table tr input").prop('disabled', true);

        $('#buy-stocks-table').find('tr').each(function (index) {

            if (index > 1){

                var stock  =   $(this).children().eq(0).text().trim();
                
                var qty    =   $(this).children().eq(4).children().val();

                var message = '';

                if (qty > 0)
                    $.ajax({
                        type: "POST",
                        url: '/agent/buy/' + stock + "/" + qty,
                        success: function (resp) {
                            var t = JSON.parse(resp);
                            if ( t['message'] === 'success' )
                                message += "Stock " + stock + ": Bought success at " + t['datetime'] + "\n";
                            else 
                                message += "Stock " + stock + ": " + t['message'] + "\n";
                            
                        }
                    });

                $("#buy-message").text(message);
                updateStocks();
            }
        });

        $("#buy-stocks-table tr input").prop('disabled', false);
    }

    function sellStocks() {

    }

    function updateStatus() {
        $.ajax({
            type: "GET",
            url: '/game/game_status',
            success: function (resp) {
                $('#game-state').text('Game State: ' + resp.state);
                $('#round').text(resp.round);
                //console.log(resp);
                $('#countdown').text(resp.countdown);
                $('#desc').text(resp.desc);
            }
        });
    }

    function updateStocks() {
        $("#buy-stocks-table tr input").prop('disabled', true);
        $.ajax({
            type: "GET",
            url: '/game/get_stocks',
            success: function (resp) {

                if(!resp) {
                    return;
                }

                $("#buy-stocks-table").find("tr:gt(0)").remove();

                for(var i = 0; i < resp.length; i++) {
                    var code = '<td><a href="/stock/stock/'+ resp[i].code + '">' + resp[i].code + '</a></td>';
                    var name = '<td><a href="/stock/stock/'+ resp[i].name + '">' + resp[i].name + '</a></td>';
                    var category = '<td><a href="/stock/stock/'+ resp[i].category + '">' + resp[i].category + '</a></td>';
                    var value = '<td><a href="/stock/stock/'+ resp[i].value + '">' + resp[i].value + '</a></td>';
                    var qty = '<td width="150px"><input type="number" value="0"/></td>';
                    var row = $('<tr>').append(code, name, category, value, qty);

                    $('#buy-stocks-table').append(row);
                }

                $("#buy-stocks-table tr input").prop('disabled', false);
            }
        })
    }

    function updatePlayers() {
        $.ajax({
            type: "GET",
            url: '/game/get_players',
            success: function (resp) {

                if(!resp) {
                    return;
                }

                $("#players-table").find("tr:gt(0)").remove();

                for(var i = 0; i < resp.length; i++) {
                    var avatar = '<td><a href="/player/'+ resp[i].Username + '"><img width="50" height="50" src="' + resp[i].Avatar + '"/></a></td>';
                    var name = '<td><a href="/player/'+ resp[i].Username + '">' + resp[i].Username + '</a></td>';
                    var cash = '<td><a href="/player/'+ resp[i].Username + '">' + resp[i].Cash + '</a></td>';
                    var row = $('<tr>').append(avatar, name, cash);

                    $('#players-table').append(row);
                }
            }
        });
    }

    setInterval(updatePlayers, 2000);
    setInterval(updateStocks, 10000);
    setInterval(updateStatus, 2000);
</script>

