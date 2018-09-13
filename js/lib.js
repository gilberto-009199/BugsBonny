function include(file) {
    /*Função responsavel por permitir o import de arquivos js externos*/
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = file;
    document.body.appendChild(script);
}
function DialogConfirm(success, error) {
    this.success = success;
    this.error = error; // Envia a frase padrão caso uma menssagem não seja passada por parametro
    this.view = function (msg ='A informação confere?',titulo='Confirma') {
        var janela = document.createElement("div");
        //janela.style="position:fixed; height:100px; width:100px; display:block; background-color:black;";
        document.body.appendChild(janela);
        $(janela).load('../elements/ConfirmDialog.php', function (sresponseText, statusText, xhr)
        {//função de retorno função callback ocorre quando acaba dando erro ou dando certo
            if (statusText == "success") {
                $('#btnConfirm').click(success);
                $('#btnRevoke').click(error);
                $('#msgDialog').html(' '+msg+' ');
                $('#titulo').html(' '+titulo+' ');
            }
            if (statusText == "error") {
                alert("ATenção um erro Ocorreu: " + xhr.status + " - " + xhr.statusText);
            }
        });

    };


}
function ajax() {
    var ObjetoAjax = false;
    if (window.XMLHttpRequest) {
        ObjetoAjax = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        ObjetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        if (!ObjetoAjax) {
            ObjetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else {
        alert("Lamento, você não podera usar o sistema aplicação!");
    }
    return ObjetoAjax;
}
function sendAjax(parametros, url, type) {
    this.success;//função que ocorera se tudo correr bem
    this.error;//função que ocorera quando tudo der errado!!kkk
    this.url = url;
    this.type = type; // get ou post
    this.parametros = "{" + parametros + "}";
    this.setSuccess = new function (metodo) {
        this.success = metodo;
    };
    this.setError = new function (metodo) {
        this.error = metodo;
    };
    this.enviar = new function () {
        $.ajax({
            url: this.url,
            type: this.type,
            dataType: 'html',
            data: this.parametros,
            success: this.success,
            error: this.error
        });
    };

}