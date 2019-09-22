<?PHP
//Show errors
function DisplayErrors(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//Check the database for existent entries.
function VerificaValidade($sql, $link)
{
    $result   = mysqli_query($link, $sql);
    $array    = mysqli_fetch_assoc($result);

    if ($array > 0) {
        return false;
    } else {
        return true;
    }
}

//Shoe alert and redirect.
function Redirect($text, $redirect_page)
{
    echo '<script type="text/javascript">';
    echo 'alert("' . $text . '");';
    echo 'window.location.href = "' . $redirect_page . '";';
    echo '</script>';
}
?>