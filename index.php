<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" />
    <title>CRUD de Empresas</title>
</head>

<body>
    <div id="container">

        <!-- PAGE TITLE -->
        <header>
            <h1>CRUD de Empresas</h1>
        </header>

        <!-- MENU -->
        <div id="menu">
            <!-- The letter sent in the funcion is the prefix of the form file -->
            <div class="link-holder">
                <a class="link" onclick='loadForm(this.parentElement, "c")'>Cadastrar Empresa</a>
            </div>

            <div class="link-holder">
                <a class="link" onclick='loadForm(this.parentElement, "rn")'>Pesquisar Por Nome</a>
            </div>

            <div class="link-holder">
                <a class="link" onclick='loadForm(this.parentElement, "rc")'>Pesquisar Por CNPJ</a>
            </div>
        </div>

        <!-- MAIN CONTENT OF THE PAGE -->
        <div id="main-content">
            <!-- Ajax will display the forms here -->
        </div>

    </div>

    <script>
        function loadForm(a_element, crud_id) {
            /* Toggle the "selected" class to show which is the current active form */
            var links = document.querySelectorAll('.link-holder');

            var concat_string = "_empresa.php";
            crud_id += concat_string;

            for (let i = 0; i < links.length; i++) {
                if (links[i].classList.contains('selected')) {
                    links[i].classList.toggle('selected');
                }
            }
            a_element.classList.toggle('selected');

            /* Ajax will change the form in the content of "main-content" div */
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("main-content").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", crud_id, true);
            xhttp.send()
        }
    </script>
    <script src="js/main.js"></script>
</body>

</html>