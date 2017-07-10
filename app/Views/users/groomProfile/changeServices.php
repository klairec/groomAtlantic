<?php $this->layout('layoutTestNico', ['title' => 'Modifier mes services']) ?>

<?php $this->start('main_content') ?>

<?php if(count($errors) > 0): ?>
    <p style="color:red;"><?=implode('<br>', $errors); ?></p>
<?php endif; ?>

<form method="POST">
    <table>
        <tr>
            <label for="checkIn">
                <td>Check-in</td>
                <td><input type="checkbox" name="id_skill[]" value="checkIn"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
        </tr>
        <br>

        <tr>
            <label for="checkOut">
                <td>Check-out</td>
                <td><input type="checkbox" name="id_skill[]" value="checkOut"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
        </tr>
        <br>

        <tr>
            <label for="cleaning">
                <td>Ménage</td>
                <td><input type="checkbox" name="id_skill[]" value="cleaning"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
            <br>
        </tr>

        <tr>
            <label for="gardenMaintenance">
                <td>Entretien espaces verts</td>
                <td><input type="checkbox" name="id_skill[]" value="gardenMaintenance"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
            <br>
        </tr>

        <tr>
            <label for="spMaintenance">
                <td>Entretien piscine</td>
                <td><input type="checkbox" name="id_skill[]" value="spMaintenance"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
            <br>
        </tr>

        <tr>
            <label for="fixing">`
                <td>Petit bricolage / Réparations</td>
                <td><input type="checkbox" name="id_skill[]" value="fixing"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
            <br>
        </tr>

    </table>
    <button type="submit" class="btn btn-submit">Modifier mes services</button>

</form>

<a href="<?= $this->url('users_showowner')?>" class="btn btn-blue">Retour</a>

<?php $this->stop('main_content') ?>