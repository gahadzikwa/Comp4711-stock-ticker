<h1>Home</h1>
<h2>Today's Stocks</h2>
<div class="table-responsive"> 
    <table class="table">
        {stocks}
        <tr> 
            <td><a href="/stock/{code}" id="{code}">{code}</a> </td>
            <td><a href="/stock/{code}" id="{code}">{name}</a> </td>
            <td><a href="/stock/{code}" id="{code}">{category}</a> </td>
            <td><a href="/stock/{code}" id="{code}">{value}</a> </td> 
        </tr>
        {/stocks}
    </table>
</div>
<br>
<h2>Players</h2>
<div class="table-responsive"> 
    <table class="table">
        {players}
        <tr> 
            <td><a href="/player/{id}" id="{player}">{player}</a> </td>
            <td><a href="/player/{id}" id="{player}">{cash}</a> </td>
        </tr>
        {/players}
    </table>
</div>