const telefone = document.getElementById("telefone-c");

telefone.addEventListener("input", function() {
    let numero = telefone.value.replace(/\D/g, "");
    numero = numero.slice(0, 11);

    if (numero.length > 7) {
        numero = numero.replace(/^(\d{2})(\d{5})(\d{0,4})$/, "($1) $2-$3");
    } else if (numero.length > 2) {
        numero = numero.replace(/^(\d{2})(\d{0,5})$/, "($1) $2");
    } else if (numero.length > 0) {
        numero = numero.replace(/^(\d{0,2})$/, "($1");
    }

    telefone.value = numero;
});