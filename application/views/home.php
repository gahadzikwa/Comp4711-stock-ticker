<h1>This is just a test to make sure template is working.</h1>
<p>Brandon is so sexy.</p>

<table class="stocks" >
    {stock}
    <tr> 
        <td><a href="/stock/{name}" id="{name}">{code}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{name}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{category}</a> </td>
        <td><a href="/stock/{name}" id="{name}">{value}</a> </td> 
    </tr>
    {/stock}
</table>