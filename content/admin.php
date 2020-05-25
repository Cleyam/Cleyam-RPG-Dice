<h1 class="text-center font-weight-bold">Cleyam RPG Dice</h1>
<div class="mx-5 mt-5">
    <table class="table table-dark shadow">
        <thead>
            <tr>
                <th scope="col">Time</th>
                <th scope="col">User</th>
                <th scope="col">Dice Type</th>
                <th scope="col">Dice Number</th>
                <th scope="col">Result</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                $user = $wpdb->get_results("SELECT * FROM $wp_user_table WHERE ID=$row->user_id;");
            ?>
                <tr>
                    <th scope="row"><?= $row->time ?></th>
                    <td><?= $user[0]->user_login ?></td>
                    <td><?= $row->diceType ?></td>
                    <td><?= $row->diceNumber ?></td>
                    <td><?= $row->result ?></td>
                </tr>
            <?php } ?>


        </tbody>
    </table>
</div>