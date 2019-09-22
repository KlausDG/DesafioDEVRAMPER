<div class="form-content animate">
    <h2>Cadastrar Empresa</h2>
    <form action="process_registration.php" method="post" id="form">
        <div class="form-input">
            <label for="name"><b>Nome:</b></label>
            <input type="text" name="name" id="name" placeholder="Digite o nome aqui" required>
        </div>

        <div class="form-input">
            <label for="cnpj"><b>CNPJ:</b></label>
            <input type="text" name="cnpj" id="cnpj" maxlength="14" required />
        </div>

        <div class="form-input">
            <label for="cnae"><b>CNAE:</b></label>
            <input type="text" name="cnae" id="cnae" maxlength="6" required />
        </div>

        <div class="form-input">
            <label for="address"><b>Endereço:</b></label>
            <input type="text" name="address" id="address" placeholder="Digite o endereço aqui" required />
        </div>

        <div id="button-holder">
            <button type="button" class="clear-btn" onclick='document.getElementById("form").reset();'>Limpar</button>
            <input type="submit" class="submit-btn" value="Enviar">
        </div>
    </form>
</div>