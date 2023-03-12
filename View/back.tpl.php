<!--Template du back-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Back-Office</title>
        <meta name="description" content="Back-office utilisateurs">
        <link rel="stylesheet" href="/dist/main.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
    <header>
        <nav>
            <div class="nav-main">
                <div class="nav-header">
                    <h1>Jedy Test</h1>
                </div>
                <ul class="menu">
                    <li>
                        <a href="#">CRUD</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <main>

        <?php
        //Inclusion de la vue appeler dans l'assign
        include $this->view.".view.php";
        ?>
    </main>
    <script src="src/js/main.js" type="text/javascript">

    </script>
    </body>
</html>
