<h1>Player page</h1>

<p>
We are here because I'm testing the shit
</p>

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose Different Player
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    {dropdown}
        <li><a id="{ID}" onclick="SelectPlayer({ID})" href="/player/{ID}">{Player}</a></li>
    {/dropdown}
  </ul>
</div>

<div class="table">
  <table class="table table-condensed" id="myTable">
    {players}
    <tr>
        <td>{ID}</td>
        <td>{Player}</td>
        <td>{Cash}</td>
    </tr>
    {/players}
  </table>
</div>

<script>
function SelectPlayer(id)
{

}
</script>
