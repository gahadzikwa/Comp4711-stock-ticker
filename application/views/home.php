<h1>This is just a test to make sure template is working.</h1>
<p>Brandon is so sexy.</p>

<table class="table">
    {stocks}
    <tr> 
        <td><a href="/stock/{name}" id="{name}">{code}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{name}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{category}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{value}</a> </td> 
    </tr>
    {/stocks}
</table>
<br>
<br>
<br>
<table class="table">
    {players}
    <tr> 
        <td><a href="/player/{id}" id="{player}">{player}</a> </td>
        <td><a href="/player/{id}" id="{player}">{cash}</a> </td>
    </tr>
    {/players}
</table>