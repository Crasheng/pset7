<table class="table table-striped">
    <thead>
        <tr>
            <th>Transact</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $position["Transact"] ?></td>
                <td><?= $position["Date_time"] ?></td>
                <td><?= $position["Symbol"] ?></td>
                <td><?= $position["Shares"] ?></td>
                <td><?= $position["Price"]*$position["Shares"] ?></td>
            </tr>
        <? endforeach ?>
    </tbody>
</table>
