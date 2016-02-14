<h1 style="display:inline"><?php echo $player['Player'] ?></h1>
<div class="dropdown pull-right my-dropdown" style="display:inline">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        <?php echo $player['Player'] ?>
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
          <th>Quantity</th>
      </tr>
    {holdings}
    <tr>
        <td>{ID}</td>
        <td>{Player}</td>
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