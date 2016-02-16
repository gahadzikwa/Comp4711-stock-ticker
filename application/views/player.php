<h1 style="display:inline">{player}</h1>
<div class="dropdown pull-right my-dropdown" style="display:inline">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        {player}
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {players}
        <li><a id="{ID}" href="/player/player/{ID}">{Player}</a></li>
        {/players}
    </ul>
</div>
<p>
    Player Profile Page
</p>
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
            <th>Quantity</th>
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