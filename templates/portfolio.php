<table class="table table-striped">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $position["symbol"] ?></td>
                <td><?= $position["name"] ?></td>
                <td><?= $position["shares"] ?></td>
                <td><?= $position["price"] ?>$</td>
                <td><?= $position["price"]*$position["shares"] ?>$</td>
            </tr>
        <? endforeach ?>
        <tr>
            <td colspan="4">Cash</td>
            <td><?= $cash?>$</td>
        </tr>
    </tbody>
</table>
