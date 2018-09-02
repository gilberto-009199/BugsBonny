function include(file){
 /*Função responsavel por permitir o import de arquivos js externos*/
 var script = document.createElement("script");
 script.type = "text/javascript";
 script.src = file;
 document.body.appendChild(script);
}
function ajax(){
    var ObjetoAjax =false;
    if(window.XMLHttpRequest){
        ObjetoAjax =new XMLHttpRequest();
    }else if(window.ActiveXObject){
        ObjetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        if(!ObjetoAjax){
        ObjetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }else{
        alert("Lamento, você não podera usar o sistema aplicação!");
    }
    return ObjetoAjax;
}
function sendAjax(parametros,url,type){
    this.success;//função que ocorera se tudo correr bem
    this.error;//função que ocorera quando tudo der errado!!kkk
    this.url = url;
    this.type= type; // get ou post
    this.parametros = "{"+parametros+"}";
    this.setSuccess= new function (metodo){
        this.success = metodo;
    };
    this.setError= new function (metodo){
        this.error = metodo;
    };
    this.enviar = new function(){
        $.ajax({
            url:this.url,
            type:this.type,
            dataType:'html',
            data:this.parametros,
            success:this.success,
            error:this.error
        });
    };
    
}