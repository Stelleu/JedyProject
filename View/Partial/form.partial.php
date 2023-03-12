
<form method="<?= $config["config"]["method"]??"POST" ?>"  class="input-group" id="<?= $config["config"]["id"]?>" action="<?= $config["config"]["action"]??"" ?>">

    <?php foreach ($config["inputs"] as $name=>$input):?>

<div class=" col ms-2">
    <input name="<?=$name?>"
           id="<?=$input["id"]?>"
           type="<?=$input["type"]?>"
           class="<?=$input["class"]?>"
           placeholder="<?=$input["placeholder"]?>"
           value="<?= ($_POST[$name])??""?>"
        <?= (!empty($input["required"]))?'required="required"':'' ?>
    >
</div>

    <?php endforeach;?>
    <div class="col">
    <input type="submit" class="button button-black " value="<?= $config["config"]["submit"]??"Valider" ?>">
    </div>
</form>