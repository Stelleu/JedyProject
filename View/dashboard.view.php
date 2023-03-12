<section>
    <div class="container">
        <div class="row my-5">
            <div class="col tx-center">
                <h2 class="my-3">CRUD</h2>
                <p> Voici l'API REST comme souhaiter, je n'ai pas eu le temps de mettre en place la partie UPDATE néanmoins j'ai mis le code en commentaire.
                    <br>
                    Malheureusement l'interface n'est pas aussi peaufiner que je l'aurais souhaitée (plusieurs longs moments de debug, on eut raison de moi).
                    <br>
                    Malgré cela j'espère vous avoir donné un bon aperçu de ma façon de coder et que cela vous convient..
                </p>

            </div>
        </div>
    </div>
</section>
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
                                <div class="row">

                                    <form method="post" id="delete" action="delete" class="ps-2">
                                            <input hidden name="id" value="<?= $infoUser["ID"]?>">
                                            <button type="submit" class="button button-alert" >
                                                delete
                                            </button>
                                            </a>
                                    </form>
                                    <form method="post" id="delete" action="edit">
                                            <input hidden name="id" value="<?= $infoUser["ID"]?>">
                                            <button type="submit" class="button button-sucess" >
                                                edit
                                            </button>
                                            </a>
                                    </form>
                                </div>
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

