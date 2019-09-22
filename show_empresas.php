<?php
    include 'inc_mySQLConnect.php';

    $sql      = $_POST['sql'];
    $result   = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        // output data of each row
        while($array = mysqli_fetch_assoc($result)) 
        {
            $empresa = new Empresa(
                $array['name'],
                $array['cnpj'],
                $array['cnae'],
                $array['address']
            );
        
            echo "<div class='empresa-show'>";
            echo "  <h1>$empresa->nome</h1>";
            echo "  <p>CNPJ - $empresa->cnpj</p>";
            echo "  <p>CNAE - $empresa->cnae</p>";
            echo "  <p>Endereço - $empresa->endereco</p>";
            echo "  <button type='button' class='submit-btn' onclick=''>Editar</button>";
            echo "  <button type='button' class='clear-btn' onclick=''>Excluir</button>";
            echo "</div>";
        }
    } 
    else 
    {
        echo "0 results";
    }

    mysqli_close($link);
