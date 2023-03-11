<form method="<?= $config["config"]["method"]??"POST" ?>" action="<?= $config["config"]["action"]??"" ?>">

    <?php foreach ($config["inputs"] as $name=>$input):?>

    <input name="<?=$name?>"
           id="<?=$input["id"]?>"
           type="<?=$input["type"]?>"
           class="<?=$input["class"]?>"
           placeholder="<?=$input["placeholder"]?>"
        <?= (!empty($input["required"]))?'required="required"':'' ?>
    >
    <br>
    <?php endforeach;?>

    <input type="submit" class="button " value="<?= $config["config"]["submit"]??"Valider" ?>">
</form>