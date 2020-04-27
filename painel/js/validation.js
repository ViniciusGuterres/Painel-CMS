function validation(formRegister) {

    if (formRegister.nameRegister.value == "") {
        alert('Insira um nome');
        return false;
    }
    if (formRegister.descriptionRegister.value == "") {
        alert('Insira uma descrição');
        return false;
    }
    return true;
    
}