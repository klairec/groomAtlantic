<?php $this->layout('layoutTestNico', ['title' => 'Modifier mes services']) ?>

<?php $this->start('main_content') ?>

<?php if(count($errors) > 0): ?>
    <p style="color:red;"><?=implode('<br>', $errors); ?></p>
<?php endif; ?>
<?php var_dump($changeSkills) ?>
<?php var_dump($services) ?>

<form method="POST">

    <div class="form-group">
        <label for="description">Ajouter une description</label>
        <textarea name="description"></textarea>
    </div>

    <table>
        <tr>
            <label for="checkIn">
                <td>Check-in</td>
                <td><input type="checkbox" name="id_skill[]" value="1"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
        </tr>
        <br>

        <tr>
            <label for="checkOut">
                <td>Check-out</td>
                <td><input type="checkbox" name="id_skill[]" value="2"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
        </tr>
        <br>

        <tr>
            <label for="cleaning">
                <td>Ménage</td>
                <td><input type="checkbox" name="id_skill[]" value="3"></td>
                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
            </label>
            <br>
        </tr>
        <tr>
            <label for="gardenMaintenance">
                <td>Entretien espaces verts</td>
                <td><input type="checkbox" name="id_skill[]" value="4"></td>
                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
            </label>
            <br>
        </tr>
        <tr>
            <label for="spMaintenance">
                <td>Entretien piscine</td>
                <td><input type="checkbox" name="id_skill[]" value="5"></td>
                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
            </label>
            <br>
        </tr>

        <tr>
            <label for="fixing">`
                <td>Petit bricolage / Réparations</td>
                <td><input type="checkbox" name="id_skill[]" value="6"></td>
                <td><input type="text" name="price[]" value=""></td>
            </label>
            <br>
        </tr>

    </table>
    <button type="submit" class="btn btn-submit">Modifier mes services</button>

</form>

<a href="<?= $this->url('users_showgroom')?>" class="btn btn-blue">Retour</a>

<?php $this->stop('main_content') ?>