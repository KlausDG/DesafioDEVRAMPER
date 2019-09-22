<div class="form-content animate">
    <h2>Pesquisar por Nome</h2>
    <div class="form-search">
        <input type="text" name="name" id="search-name" onkeyup="CrudAjax(this.value, '&o=nome', 'load_data.php', 'search-result')" placeholder="Digite o nome da empresa.">
    </div>
    <div id="search-result">

    </div>
</div>