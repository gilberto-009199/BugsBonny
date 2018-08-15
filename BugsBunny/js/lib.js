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
