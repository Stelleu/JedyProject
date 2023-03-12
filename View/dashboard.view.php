<h1>Tableau de bord</h1>
<h2>Welcome</h2>
<section>
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                    <?php $this->includePartial("form", $user->getFormRegister()); ?>
            </div>
        </div>
    </div>

</section>
<section>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-hover" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($users as $cle => $infoUser){?>
                        <tr>
                            <th> <?php echo "#".$infoUser["ID"]?></th>
                            <th > <?php echo $infoUser["Name"]?></th>
                            <th> <?php echo $infoUser["Email"]?></th>
                            <th>
                                <form method="post" id="delete" action="delete">
                                        <input hidden name="id" value="<?= $infoUser["ID"]?>">
                                        <button type="submit" class="button button-alert" >
                                            delete
                                        </button>
                                        </a>
                                </form>
                            </th>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <div id="res"></div>



            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){

        $("#delete").submit(function(e){
            e.preventDefault(); //empêcher une action par défaut
            var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
            var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
            var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission

            $.ajax({
                url : form_url,
                type: form_method,
                data : form_data
            }).done(function(response){
                location.reload();
            });
        });
        $("#add").submit(function(e){
            e.preventDefault();
            var form_url = $(this).attr("action");
            var form_method = $(this).attr("method");
            var form_data = $(this).serialize();

            $.ajax({
                url : form_url,
                type: form_method,
                data : form_data
            }).done(function(response){
                location.reload();
            });
        });
    });
</script>

