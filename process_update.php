<?php

include "inc_mySQLConnect.php";
include "inc_Empresa.php";
include 'inc_functions.php';

/*************************/

$empresa = new Empresa(
    $_POST['name'],
    $_POST['cnpj'],
    $_POST['cnae'],
    $_POST['address']
);

$old_name = $_POST['old-name'];
$old_cnpj = $_POST['old-cnpj'];
$index = "index.php";

//Validation of the name and cnpj. This will check if there's already a "empresa" with the specified name and cnpj.
if (!VerificaValidade("SELECT * FROM empresas WHERE nome='$empresa->nome' AND cnpj='$empresa->cnpj'", $link)) {
    Redirect(
        "Já existe uma empresa com esse nome e cnpj cadastrada no sistema",
        $index
    );
} else if (!VerificaValidade("SELECT * FROM empresas WHERE nome='$empresa->nome' AND cnpj!='$old_cnpj'", $link)) {
    Redirect(
        "Já existe uma empresa com esse nome cadastrada no sistema",
        $index
    );
} else if (!VerificaValidade("SELECT * FROM empresas WHERE nome='$old_name' AND cnpj!='$empresa->cnpj'", $link)) {
    Redirect(
        "Já existe uma empresa com esse cnpj cadastrada no sistema",
        $index
    );
} else {
    $sql = "UPDATE empresas SET 
             nome = '$empresa->nome', 
             cnpj = '$empresa->cnpj', 
             cnae = '$empresa->cnae',
             endereco = '$empresa->endereco'
             WHERE cnpj = $old_cnpj;
    ";

    $result = mysqli_query($link, $sql);

    Redirect(
        "Empresa cadastrada com sucesso.",
        $index
    );
}

mysqli_close($link);
