<h1>Stock History</h1>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Stocks
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {stocks}
        <li><a href="/stockhistory/stock/{id}">{code}</a></li>
        {/stocks}
    </ul>
</div>


<h2>Stock Movements</h2>
<div class="table">
    <table class="table table-condensed" id="movements">
        {stockmovements}
        <tr>
            <td>{Datetime}</td>
            <td>{Action}</td>
            <td>{Amount}</td>
        </tr>
        {/stockmovements}
    </table>
</div>


<h2>Stock Transactions</h2>
<div class="table">
    <table class="table table-condensed" id="transactions">
        {stocktransactions}
        <tr>
            <td>{DateTime}</td>
            <td>{Player}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
        {/stocktransactions}
    </table>
</div>