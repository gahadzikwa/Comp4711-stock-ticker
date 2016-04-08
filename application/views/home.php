<h1>{welcome}</h1>
<h2>Stocks</h2>
<a href="/agent/game_status">Test</a>
<div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Category</th>
            <th>Value</th>
        </tr>
        {stocks}
        <tr>
            <td><a href="/stock/stock/{ID}">{Code}</a> </td>
            <td><a href="/stock/stock/{ID}">{Name}</a> </td>
            <td><a href="/stock/stock/{ID}">{Category}</a> </td>
            <td><a href="/stock/stock/{ID}">{Value}</a> </td>
        </tr>
        {/stocks}
    </table>
</div>
<br>
<h2>Players</h2>
<div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>Player</th>
            <th>Cash</th>
            <th>Equity</th>
        </tr>
        {players}
        <tr> 
            <td><a href="/player/player/{ID}">{Player}</a> </td>
            <td><a href="/player/player/{ID}">{Cash}</a> </td>
            <td><a href="/player/player/{ID}">{Equity}</a> </td>
        </tr>
        {/players}
    </table>
</div>

