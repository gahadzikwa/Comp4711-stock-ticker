<h1>Settings</h1>

<div class="row">
    <div class="list-group col-md-4">
        <a class="list-group-item">
            <img width="100px" height="100px" src="{curent_player_avatar}" />
            <h1 style="display: inline;">{current_player_username}</h1>
        </a>
        <a class="list-group-item active">
            <h4 class="list-group-item-heading"></h4>
        </a>
        <a class="list-group-item">
            <h4 class="list-group-item-heading">
                Change Avatar
            </h4>
            <p class="list-group-item-text">
                <?php if (isset($error)) echo $error;?>
                <?php echo form_open_multipart('/settings/update_avatar');?>
                <form role="form" action="/settings/update_avatar" method="POST">
                    <div class="form-group">
                        <input style="display:inline" type="file" name="userfile" accept="image/*">
                        <input style="display:inline" type="submit" class="btn btn-success pull-right" value="Save"/>
                    </div>
                </form>
            </p>
        </a>
    </div>
    <div class="col-md-4">
        <h2>Change Password</h2>
        <form onsubmit="return changePassword(this)" action="#" method="">
            <div class="form-group">
                <label for="newpassword">New Password:</label>
                <input id="newpassword" oninput="checkNewPassword()" type="password" name="newpassword" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password:</label>
                <input id="confirmpassword" oninput="checkNewPassword()" type="password" class="form-control" name="confirmpassword">
            </div>
            <div class="form-group">
                <label for="oldpassword">Old Password:</label>
                <input id="oldpassword" oninput="checkNewPassword()" type="password" class="form-control" name="oldpassword">
            </div>
            <button id="passwordsubmit" disabled="true" type="submit" class="pull-right btn btn-success has-spinner">
                <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
                Update
            </button>
        </form>
    </div>
</div>
<script>
    function changePassword(form) {

        var url = '/settings/update_password/' + form.newpassword.value + '/' + form.oldpassword.value;

        $.ajax({
            type: "POST",
            url: url,
            success: function (resp) {
                if(resp == 'true') {
                    alert('Password successfully changed.');
                }
                else {
                    alert('Incorrect old password.  Password change aborted.')
                }

                $('#newpassword').val('');
                $('#oldpassword').val('');
                $('#confirmpassword').val('');
            }
        });

        return true;
    }

    function checkNewPassword() {
        if($('#newpassword').val() == $('#confirmpassword').val() && $('#oldpassword').val()) {
            $("#passwordsubmit").prop('disabled', false);
        }
        else {
            $("#passwordsubmit").prop('disabled', true);
        }
    }
</script>