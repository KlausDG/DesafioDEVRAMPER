<?PHP
class Empresa
{
    var $nome;
    var $cnpj;
    var $cnae;
    var $endereco;

    function __construct($nome, $cnpj, $cnae, $endereco)
    {
        $this->nome     = $nome;
        $this->cnpj     = $cnpj;
        $this->cnae     = $cnae;
        $this->endereco = $endereco;
    }
}

?>