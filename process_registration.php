<?php
//Includes
include "inc_mySQLConnect.php";
include "inc_Empresa.php";
include "inc_functions.php";

/*************************/

$empresa = new Empresa(
    $_POST['name'],
    $_POST['cnpj'],
    $_POST['cnae'],
    $_POST['address']
);

$index = "index.php";

//Validation of the name and cnpj. This will check if there's already a "empresa" with the specified name and cnpj.
if (!VerificaValidade("SELECT nome FROM empresas WHERE nome='$empresa->nome'", $link)) {
    Redirect(
        "Já existe uma empresa com esse nome cadastrada no sistema",
        $index
    );
} else if (!VerificaValidade("SELECT cnpj FROM empresas WHERE cnpj='$empresa->cnpj'", $link)) {
    Redirect(
        "Já existe uma empresa com esse CNPJ cadastrada no sistema",
        $index
    );
} else {
    $sql = "INSERT INTO empresas (nome, cnpj, cnae, endereco) VALUES (
        '$empresa->nome', 
        '$empresa->cnpj', 
        '$empresa->cnae', 
        '$empresa->endereco'
    )";

    $result = mysqli_query($link, $sql);

    Redirect(
        "Empresa cadastrada com sucesso.",
        $index
    );
}

mysqli_close($link);
