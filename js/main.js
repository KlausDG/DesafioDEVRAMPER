function MaskCNPJ(cnpj) {
    if (MaskInt(cnpj) == false) {
        event.returnValue = false;
    }
    return FormatField(cnpj, '00.000.000/0000-00', event);
}

function maskCNAE(cnae) {
    if (MaskInt(cnae) == false) {
        event.returnValue = false;
    }
    return FormatField(cnae, '0000-0', event);
}

function MaskInt() {
    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
        return false;
    }
    return true;
}

function FormatField(field, mask, event) {
    var bolean_mask;

    var typed = event.keyCode;
    regex = /\-|\.|\/|\(|\)| /g
    num_only_field = field.value.toString().replace(regex, "");

    var field_pos = 0;
    var new_field_value = "";
    var mask_size = num_only_field.length;

    if (typed != 8) {
        for (i = 0; i <= mask_size; i++) {
            bolean_mask = ((mask.charAt(i) == "-") || (mask.charAt(i) == ".") ||
                (mask.charAt(i) == "/"))
            bolean_mask = bolean_mask || ((mask.charAt(i) == "(") ||
                (mask.charAt(i) == ")") || (mask.charAt(i) == " "))
            if (bolean_mask) {
                new_field_value += mask.charAt(i);
                mask_size++;
            } else {
                new_field_value += num_only_field.charAt(field_pos);
                field_pos++;
            }
        }
        field.value = new_field_value;
        return true;
    } else {
        return true;
    }
}

/***********************/

function CrudAjax(str, oper, phpFile, elementID) {
    var dom = "";
    if(oper == "delete"){
        dom = document.body;
        oper = "";
    } else if(oper == "update"){
        dom = document.getElementById(elementID);
        oper = "";
    } else {
        dom = document.getElementById(elementID);
    }
    var concat_GET = "?q=";
    phpFile += concat_GET + str + oper;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            dom.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", phpFile, true);
    xhttp.send()
}