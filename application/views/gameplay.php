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
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <h2>Buy Stocks</h2>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Value</th>
                    <th>Quantity</th>
                </tr>
                {stocks}
                <tr id="buy-table">
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
            <table class="table">
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
        <button style="min-width:100px" class="btn btn-danger pull-right" onclick="buyStocks()">Sell</button>
    </div>
</div>
<script>
    function buyStocks() {

    }

    function sellStocks() {

    }

    function updateStatus() {

    }

    function updateStocks() {

    }
</script>

