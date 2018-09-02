var main = function (){
    this.name = "BugsBunny";
    this.version = "1.0";
    this.cores =function (){
        
    }
    this.ajax=function (){
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
}


