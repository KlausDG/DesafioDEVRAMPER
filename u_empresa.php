<?PHP
//Includes
include 'inc_mySQLConnect.php';

$field = $_GET['q'];

$sql = "SELECT * FROM empresas WHERE cnpj LIKE '%$field%'";
$query = mysqli_query($link, $sql);

if ($query === FALSE) {
    die(mysqli_error($link));
}

$array = mysqli_fetch_assoc($query);

echo '<div class="form-content animate">';
echo '   <h2>Editar Cadastro de Empresa</h2>';
echo '   <form action="process_update.php" method="post" id="form">';
echo '       <div class="form-input">';
echo '           <label for="name"><b>Nome:</b></label>';
echo '           <input type="text" name="name" id="name" value="' . $array['nome'] . '" required>';
echo '       </div>';
echo '       <div class="form-input">';
echo '           <label for="cnpj"><b>CNPJ:</b></label>';
echo '           <input type="text" name="cnpj" id="cnpj" value="' . $array['cnpj'] . '" maxlength="14" required />';
echo '       </div>';
echo '       <div class="form-input">';
echo '           <label for="cnae"><b>CNAE:</b></label>';
echo '           <input type="text" name="cnae" id="cnae" value="' . $array['cnae'] . '" maxlength="6" required />';
echo '       </div>';
echo '       <div class="form-input">';
echo '           <label for="address"><b>Endereço:</b></label>';
echo '           <input type="text" name="address" id="address" value="' . $array['endereco'] . '" required />';
echo '       </div>';
echo '       <div id="button-holder">';
echo '           <input type="submit" class="submit-btn" value="Enviar">';
echo '       </div>';
echo '       <input type="hidden" name="old-name" value="' . $array['nome'] . '">';
echo '       <input type="hidden" name="old-cnpj" value="' . $array['cnpj'] . '">';
echo '   </form>';
echo '</div>';

mysqli_close($link);
