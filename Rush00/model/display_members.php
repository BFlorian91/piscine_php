<?php

    function display_members()
    {
        $members = unserialize(file_get_contents("../private/passwd"));
?>      <table class="value_table">
            <?php   foreach ($members as $key => $val) { ?>
            <tr>
                <td style="text-align: center;"><?php  echo $val['login'] ?></td>
                    <?php if ($members[$key]['ban']):?>
                    <td>
                        <form action="../model/ban_users.php" method="POST">
                            <input type="hidden" name="login" value="<?php echo $val['login']?>">
                            <input style="float: right; width:100px; margin-right: 10px;" name="submit" type="submit" class="button_in_form" value="unban">
                        </form>
                    </td>
                    <?php else:?>
                    <td>
                        <form action="../model/ban_users.php" method="POST">
                            <input type="hidden" name="login" value="<?php echo $val['login']?>">
                            <input style="float: right; width:100px; margin-right: 10px; background: #5f6769" name="submit" type="submit" class="button_in_form" value="ban">
                        </form>
                    </td>
                    <?php endif; ?>
                    <td>
                        <form action="../model/action_remove_user.php" method="POST">
                            <input type="hidden" name="login" value="<?php echo $val['login']?>">
                            <input style="float: right; width:100px; margin-right: 10px;" type="submit" class="button_in_form" value="remove">
                        </form>
                    </td>
<?php       } ?>
            </tr>
            </table>
<?php    }