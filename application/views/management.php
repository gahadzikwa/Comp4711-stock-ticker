<h1>Management</h1>
<div class="row">
    <h2>Register Agent</h2>
    <div class="col-md-4">
        <form onsubmit="return register(this)" action="#" method="">
            <div class="form-group">
                <label for="teamid">Team ID:</label>
                <input type="text" name="teamid" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="teamname">Team Name:</label>
                <input type="text" class="form-control" name="teamname">
            </div>
            <div class="form-group">
                <label for="password">Secret Word:</label>
                <input type="text" class="form-control" name="password">
            </div>
            <button type="submit" class="pull-right btn btn-success has-spinner">
                <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
                Submit
            </button>
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
                <th>Username</th>
                <th>Cash</th>
                <th>Delete</th>
            </tr>
            {players}
            <tr id="row-{Username}">
                <td><a href="/player/{Username}"><img width="50" height="50" src="{Avatar}"/></a></td>
                <td><a href="/player/{Username}">{Username}</a> </td>
                <td><a href="/player/{Username}">{Cash}</a></td>
                <td>
                    <button class="btn btn-danger has-spinner" onclick="deletePlayer('{Username}', this)">
                        <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
                        Delete
                    </button>
                </td>
            </tr>
            {/players}
        </table>
    </div>
</div>
<script>
    function register(form) {
        if($('form button').hasClass('active')) {
            return;
        }

        $('form button').toggleClass('active');
        $('form input').prop('disabled', true);

        var url = '/agent/register_agent';
        url += '/' + form.teamid.value;
        url += '/' + form.teamname.value;
        url += '/' + form.password.value;

        $.ajax({
            type: "POST",
            url: url,
            success: function (resp) {
                $('form button').toggleClass('active');
                $('form input').prop('disabled', false);
                $('form input').val('');
                alert("Registration Successful!");
            }
        });
    }

    function deletePlayer(name, btn) {
        if($(btn).hasClass('active')) {
            return;
        }

        $(btn).toggleClass('active');

        var url = '/agent/delete_player/' + name;

        $.ajax({
            type: "POST",
            url: url,
            success: function (resp) {
                $('#row-' + name).remove();
            }
        });
    }

</script>