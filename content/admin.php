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
                <<<ROW
"<tr>
<th scope="row">1</th>
<td>Mark</td>
<td>Otto</td>
<td>@mdo</td>
</tr>"
ROW;
            }



            ?>

        </tbody>
    </table>
</div>