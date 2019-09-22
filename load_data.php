<?PHP
include 'inc_mySQLConnect.php';

$field = $_GET['q'];
$oper = $_GET['o'];
$col = '';

//This will prevent displaying database info if the string contains invalid data (like "/0").
if ($field == '') {
    return;
}

if ($oper == 'nome') {
    $col = 'nome';
} else if ($oper == 'cnpj') {
    $col = 'cnpj';
}

$sql = "SELECT * FROM empresas WHERE $col LIKE '%$field%'";
$query = mysqli_query($link, $sql);

if ($query === FALSE) {
    die(mysqli_error($link));
}

while ($row = mysqli_fetch_assoc($query)) {
    echo "<div class='empresa-show'>";
    echo '<b>Nome: </b>' . $row['nome'];
    echo '<br /> <b>CNPJ: </b>' . $row['cnpj'];
    echo '<br /> <b>CNAE: </b>' . $row['cnae'];
    echo '<br /> <b>Endereço: </b>' . $row['endereco'];
    echo '<br /> ';
    echo '<button type="button" class="submit-btn" onclick="CrudAjax(' . $row['cnpj'] . ', ' . "'update'" . ', ' . "'u_empresa.php'" . ', ' . "'main-content'" . ')">Editar</button>';
    echo '<button type="button" class="clear-btn" onclick="CrudAjax(' . $row['cnpj'] . ', ' . "'delete'" . ', ' . "'d_empresa.php'" . ', ' . "'container'" . ')">Excluir</button>';
    echo "</div>";
}

mysqli_close($link);
