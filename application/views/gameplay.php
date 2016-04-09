<h1>{welcome}</h1>
<h2>Stocks</h2>
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
            <td><a href="/stock/stock/{code}">{code}</a> </td>
            <td><a href="/stock/stock/{code}">{name}</a> </td>
            <td><a href="/stock/stock/{code}">{category}</a> </td>
            <td><a href="/stock/stock/{code}">{value}</a> </td>
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
            <td><a href="/player/player/{Username}">{Username}</a> </td>
            <td><a href="/player/player/{Username}">{Cash}</a> </td>
            <td><a href="/player/player/{Username}">{Equity}</a> </td>
        </tr>
        {/players}
    </table>
</div>

