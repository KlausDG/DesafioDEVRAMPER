<div class="form-content animate">
    <h2>Pesquisar por CNPJ</h2>
    <div class="form-search">
        <input type="text" name="cnpj" id="search-cnpj" onkeyup="CrudAjax(this.value, '&o=cnpj', 'load_data.php', 'search-result')" placeholder="Digite o CNPJ da empresa.">
    </div>
    <div id="search-result">

    </div>
</div>