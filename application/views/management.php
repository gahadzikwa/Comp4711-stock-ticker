<h1>Management</h1>
<div class="row">
    <h2>Register Agent</h2>
    <div class="col-md-4">
        <form role="form" action="/agent/register_agent" method="post">
            <div class="form-group">
                <label for="teamid">Team ID:</label>
                <input type="text" name="teamid" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="teamname">Team Name:</label>
                <input type="text" class="form-control" name="teamname">
            </div>
            <div class="form-group">
                <label for="secretword">Secret Word:</label>
                <input type="text" class="form-control" name="secretword">
            </div>
            <button type="submit" class="btn btn-default pull-right">Submit</button>
        </form>
    </div>
</div>
<br>
<div class="row">
    <h2>Players</h2>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Player</th>
                <th>Cash</th>
                <th>Delete</th>
            </tr>
            {players}
            <tr>
                <td><a href="/player/{Username}">{Username}</a> </td>
                <td><a href="/player/{Username}">{Cash}</a></td>
                <td><button class="btn btn-danger" onclick="{Username}">Delete</button></td>
            </tr>
            {/players}
        </table>
    </div>
</div>
<script>
    function deletePlayer(name) {

    }
</script>