<?PHP
//Includes
include 'inc_mySQLConnect.php';

$field = $_GET['q'];

$sql = "DELETE FROM empresas WHERE cnpj = $field";
$query = mysqli_query($link, $sql);

if ($query === FALSE) {
    die(mysqli_error($link));
}

header('Location: index.php');

mysqli_close($link);
