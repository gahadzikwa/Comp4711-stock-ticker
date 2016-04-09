<h1 style="display:inline">{stockname}</h1>
<div class="dropdown pull-right" style="display:inline">
    <button class="btn btn-primary dropdown-toggle my-dropdown" type="button" data-toggle="dropdown">
        {stockcode}
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {stocks}
        <li><a href="/stock/stock/{code}">{code}</a></li>
        {/stocks}
    </ul>
</div>
<p>{stockcode}: {stockvalue}</p>
<h2>Stock Movements</h2>
<div class="table">
    <table class="table table-condensed" id="movements">
        <tr>
            <th>Date/Time</th>
            <th>Code</th>
            <th>Action</th>
            <th>Amount</th>
        </tr>
        {stockmovements}
        <tr>
            <td>{datetime}</td>
            <td>{code}</td>
            <td><img src="/assets/images/{action}.png" alt="Smiley face" height="42"></td>
            <td>{amount}</td>
        </tr>
        {/stockmovements}
    </table>
</div>


<h2>Stock Transactions</h2>
<div class="table">
    <table class="table table-condensed" id="transactions">
        <tr>
            <th>Date/Time</th>
            <th>Agent</th>
            <th>Player</th>
            <th>Stock</th>
            <th>Transaction</th>
            <th>Quantity</th>
        </tr>
        {stocktransactions}
        <tr>
            <td>{datetime}</td>
            <td>{agent}</td>
            <td>{player}</td>
            <td>{stock}</td>
            <td>{trans}</td>
            <td>{quantity}</td>
        </tr>
        {/stocktransactions}
    </table>
</div>