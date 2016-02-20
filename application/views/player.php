<div class="list-group col-md-4">
    <a href="#" class="list-group-item active">
        {currentPlayer}
        <h4 class="list-group-item-heading">
            Current Player
        </h4>
        <p class="list-group-item-text">
            {Player}
        </p>
    </a>
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">
            Current Cash
        </h4>
        <p class="list-group-item-text">
            {Cash} peanut
        </p>
    </a>
    {/currentPlayer}
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">
            Equity
        </h4>
        <p class="list-group-item-text">
            {playerEquity} peanut
        </p>
    </a>
</div>
<div class="dropdown pull-left my-dropdown" >
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        {currentPlayer}{Player}{/currentPlayer}
    <span class="caret">
    </span>
    </button>
    <ul class="dropdown-menu">
        {playerList}
        <li>
            <a id="{ID}" href="/player/player/{ID}">
            {Player}
            </a>
        </li>
        {/playerList}
    </ul>
</div>

<div class="col-md-12">
    <h2>Current Holdings</h2>
    <div class="table">
        <table class="table table-condensed">
            <tr>
                <th>Stock</th>
                <th>Code</th>
                <th>Quantity</th>
            </tr>
            {holdings}
            <tr>
                <td>{Name}</td>
                <td>{Code}</td>
                <td>{Quantity}</td>
            </tr>
            {/holdings}
        </table>
    </div>
    <h2>Trading Activity</h2>
    <div class="table">
        <table class="table table-condensed">
            <tr>
                <th>Date/Time</th>
                <th>Stock</th>
                <th>Transaction</th>
                <th>Quantity (Peanut)</th>
            </tr>
            {transactions}
            <tr>
                <td>{DateTime}</td>
                <td>{Name}</td>
                <td>{Trans}</td>
                <td>{Quantity}</td>
            </tr>
            {/transactions}
        </table>
    </div>
</div>