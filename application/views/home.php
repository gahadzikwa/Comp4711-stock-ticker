<h1>{welcome}</h1>
<h2>Stocks</h2>
<div class="table-responsive"> 
    <table class="table">
        <tr>
            {stocksheaders}
            <th>{column}</th>
            {/stocksheaders}
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
            {playersheaders}
            <th>{column}</th>
            {/playersheaders}
        </tr>
        {players}
        <tr> 
            <td><a href="/player/player/{ID}">{Player}</a> </td>
            <td><a href="/player/player/{ID}">{Cash}</a> </td>
        </tr>
        {/players}
    </table>
</div>