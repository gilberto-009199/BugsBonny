<script src="./libs/vue/vue.js"></script>
<script src="./libs/vue/vue-resource.js"></script>
<script src="./libs/jqueryForm/form.js"></script>

<template id='msgeditArtigo'>
<div>
<div role="dialog" style='min-width:502px;' class="Alert">
    <div class="AlertTitulo">Edit. Oferta</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
      <form id='formeditOferta' method='post' enctype="multipart/form-data" action='./app/ofertas.php'>
            <table  style="min-width: 100%;">
              <tr>
                <td><label>Titulo:</label></td>
                <td><input name="titulo" v-model='artigo.titulo' type="text" ></td>
              </tr>
              <tr>
                <td><label>Valor atual:</label></td>
                <td><input  type="text"  name="valorposterior" :value="artigo.vlPosterior"></td>
              </tr>
              <tr>
                <td><label>Valor Anterior:</label></td>
                <td><input  type="text" name="valoranterior" :value="artigo.vlAnterior"></td>
              </tr>
              <tr>
                <td colspan="2"><img height="128" width="128" :src="'../imgup/'+artigo.img"></td>
              </tr>
              <tr>
                <td><input type="file" name="imagem"></td>
              </tr>
              <tr>
                <td><label>Estado: </label></td>
                <td><select name="estado" v-model='artigo.estado' require>
                      <option value='V' selected>Ativo</option>
                      <option value='F'>Desativado</option>
                    </select></td>
              </tr>
              <tr>
                  <td colspan="2">
                    <input type="hidden" name="action" value="editar">
                    <input type="hidden" name="idOferta" v-model="artigo.id">
                  </td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name='conteudo' v-model="artigo.descricao"
                    title='[titulo][/titulo],[center][/center],[justificado][/justificado]' v-show='descrisaotexto' 
                     style="display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px;"></textarea>
                    
                </td>
              </tr>
            </table>
      </div>
      <button type='submit' @click.stop.prevent="editar()" class="Esquerda btn" style="height:32px; margin:8px; margin-right:16px;">Salvar</button>
      <button @click.stop.prevent="fechar()" class="Direita btn" style="height:32px; margin:8px; margin-right:16px;">Fechar</button>
      </form>
    </div>
</div>
</div>
</template>
<script>
Vue.component('msgaedit-artigo',{
  template:'#msgeditArtigo',
  props:['artigo'],
  data(){
    return{
      descrisaotexto:true,
      descrisaoview:'',
    }
  },
  methods:{
    editar:function(){
      var elemento = this;
      $('#formeditOferta').ajaxForm({
        success:function(msg){
          console.log(msg);
          console.log("Retornou :",(msg+" ").search("true"));
          if((msg+" ").indexOf("true")>=0){
            alert('Oferta Gravado com sucesso');
            elemento.nova();
          }else{
            alert('Erro:'+msg);
          }
        },
     }).submit();
      
    },
    nova:function(){
      this.$emit('emit-update');
    },
    fechar:function(){
      console.log("Oferta Editada ",this.artigo);
      this.$emit('emit-fechar');
    },
    desview:function() {
         this.$http.get('./libs/bbcode.php?transformar='+this.artigo.conteudo).then(function(response){
            this.descrisaoview=response.data;
          });
      },
  },
  mounted:function(){
        
  },
});
</script>




<template id='msgaddArtigo'>
<div>
<div role="dialog" style='min-width:502px;' class="Alert">
    <div class="AlertTitulo">ADD. oferta</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
      <form id='formaddOferta' method='post' enctype="multipart/form-data" action='./app/ofertas.php'>
            <table  style="min-width: 100%;">
              <tr>
                <td><label>Titulo:</label></td>
                <td><input maxlength="15" name="titulo"  type="text" ></td>
              </tr>
              <tr>
                <td><label>Valor Anterior:</label></td>
                <td><input maxlength="10" name="valoranterior"  type="text" ></td>
              </tr>
              <tr>
                <td><label>Valor Posterior:</label></td>
                <td><input maxlength="10" name="valorposterior"  type="text" ></td>
              </tr>
              <tr>
                <td><label>Imagem:</label></td>
                <td><input name="Imagem"  type="file" ></td>
              </tr>
              <tr>
                <td><label>Estado: </label></td>
                <td><select name="estado"  require>
                      <option value='V' selected>Ativo</option>
                      <option value='F'>Desativado</option>
                    </select></td>
              </tr>
              <tr>
                  <td colspan="2">
                    <input type="text" class='hidden' name="action" value='criar'>
                  </td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name="conteudo"
                    title='[titulo][/titulo],[center][/center],[justificado][/justificado]'
                     v-model='artigo.conteudo' v-show='descrisaotexto' 
                     style="display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px;"></textarea>
                </td>
              </tr>
            </table>
      </div>
      <button type='submit' @click.stop.prevent="cadastrar()" class="Esquerda btn" style="height:32px; margin:8px; margin-right:16px;">Salvar</button>
      <button @click.stop.prevent="fechar()" class="Direita btn" style="height:32px; margin:8px; margin-right:16px;">Fechar</button>
      </form>
    </div>
</div>
</div>
</template>
<script>
Vue.component('msgadd-artigo',{
  template:'#msgaddArtigo',
  data(){
    return{
      artigo:{
        estado:'',
        titulo:'',
        descrisao:'',
        action:'criar',
      },
      descrisaotexto:true,
      descrisaoview:'',
    }
  },
  methods:{
    cadastrar:function(){
        var elemento = this;
        $('#formaddOferta').ajaxForm({
        success:function(msg){
          if(msg=="true"){
            alert('Oferta Gravado com sucesso');
            elemento.nova();
          }else{
            alert('Erro:'+msg);
          }
        },
     }).submit();
      
    },
    nova:function(){
      this.$emit('emit-update');
    },
    fechar:function(){
      this.$emit('emit-fechar');
    },
    desview:function() {
         this.$http.get('./libs/bbcode.php?transformar='+this.artigo.conteudo).then(function(response){
            this.descrisaoview=response.data;
          });
      },
  },
  mounted:function(){
        
  },
});
</script>






<template id="msgver">
<div>
<div role="dialog" v-show="status" class="Alert">
    <div class="AlertTitulo">Atenção</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
            <table>
              <tr>
                <td><label>Nome:</label></td>
                <td><input disabled type="text" :value="msg.titulo"></td>
              </tr>
              <tr>
                <td><label>Valor atual:</label></td>
                <td><input disabled type="text" :value="msg.vlPosterior"></td>
              </tr>
              <tr>
                <td><label>Valor Anterior:</label></td>
                <td><input disabled type="text" :value="msg.vlAnterior"></td>
              </tr>
              <tr>
                <td colspan="2"><img height="64" width="128" :src="'../imgup/'+msg.img"></td>
              </tr>
              <tr>
                <td colspan="2">
                  <label> Conteudo: </label>
                  <div style="border:solid 1px black; margin:2px; padding:2px;" v-html="msg.descricao"></div>
                </td>
              </tr>
            </table>
      </div>
      <button @click="fechar()" class="Direita btn" style="height:32px; margin:8px; margin-right:16px;">Fechar</button>
    </div>
</div>
<div>
</template>
<script>
Vue.component('msgver',{
  template: "#msgver",
  props: ['msg'],
  data: function () {
    return {
      status:false,
    }
  },
   watch: { 
      msg:function(NovaMsg) {
         //console.log('novo valor');
         this.$http.get('./libs/bbcode.php?transformar='+NovaMsg.conteudo).then(function(response){
           //alert('oi'+response.data);
           //console.log(response);
           NovaMsg.conteudo=response.data;
           //msg.descrisao = response.data;
           
          });
         this.status=true;
      }
   },
    methods:{
      fechar:function(){
          //alert('Fechar');
          this.status=false;
      }
  },
})

</script>


<template id="tblOfertas">
<div>
<msgaedit-artigo :artigo="msg.msgedit" @emit-update="update" @emit-fechar="fecharEditArtigo" v-show="msgeditartigostatus"></msgaedit-artigo>
<msgadd-artigo @emit-update="update" @emit-fechar="fecharAddArtigo" v-show="msgaddartigostatus"></msgadd-artigo>
<msgver v-show="msg.estado" :msg="msg.msg"></msgver>
<span  @click="addOferta()" style="display: block; margin: 4px; font-size: 22px; padding-top: 10px; padding-left: 10px;"><i class="fas fa-store-alt"></i>Adicionar Oferta </span>

<table cellpadding="5" width="942" style="margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
<thead style="display:block; border-bottom: solid 1px black;">
    <tr>
        <th style="padding:7px; width: 295px; border-right:solid 1px black; display:inline-block;">Titulo:</th>
        <th style="padding:7px; width: 113px; border-right:solid 1px black; display:inline-block;">Valor:</th>
        <th style="padding:7px; width: 70px; border-right:solid 1px black; display:inline-block;">Estado:</th>
        <th style="padding:7px; width: 132px; display:inline-block;">Opções:</th>
    </tr>
</thead>
<tbody>
    <tr style="border-bottom:solid 1px;" v-for="(oferta,index) in ofertas">
        <td style="padding:2px; width: 302px; display:inline-block; text-align: center;">{{oferta.titulo}}</td>
        <td style="padding:2px; width: 130px; display:inline-block; text-align: center;">R$ {{oferta.vlPosterior}}</td>
        <td style="padding:2px; width: 70px; display:inline-block; text-align: center;">
            <img style="display:block; margin-left:auto; margin-right:auto;" v-if="oferta.estado=='V'" @click="activeOferta(index)" src='./img/Accept-icon.png'>
            <img style="display:block; margin-left:auto; margin-right:auto;" v-else @click="activeOferta(index)" src='./img/disable.png'>
        </td>
        <td style="padding:2px; width: 264px; display:inline-block; text-align: center;">
            <a href="#"><label @click="exibirOferta(index)"><i class="far fa-eye"></i>Exibir</label></a>
            <a href="#"><label @click="delOferta(index)"><i class="far fa-trash-alt"></i>Deletar</label></a>
            <a href="#"><label @click="editOferta(index)"><i class="fas fa-edit"></i>Editar</label></a>
        </td> 
    </tr>
</tbody>
</table>
</div>
</template>
<script>
Vue.component('tbl-ofertas', {
  template: "#tblOfertas",
  props: ['ofertas'],
  data(){
      return{
          msg:{
            estado:false,
            msg:'oi',
            msgedit:'',
          },
          msgaddartigostatus:false,
          msgeditartigostatus:false,
      }
  },
  methods:{
      editOferta:function(index){
          
        this.msg.msgedit=this.ofertas[index];
       
        this.msgeditartigostatus=true; 
      },
      fecharEditArtigo:function(){
          this.msgeditartigostatus=false;
      },
      fecharAddArtigo:function(){
          this.msgaddartigostatus=false;
      },
      addOferta:function(){
          this.msgaddartigostatus=true;
      },
      delOferta:function(index){
          var artigo = this.ofertas[index];
           var update = this.update;
          this.$http.get("./app/ofertas.php?"+
          `action=deletar&idOferta=${artigo.id}`)
            .then(function(response){
              
              if(response.data=="true"){
                  alert('Oferta deletado');
                  update();
              }else{
                  alert('Erro:'+response.data);
                  console.log(response.data);
              }
          });
      },
      exibirOferta:function(index){
          this.msg.msg=this.ofertas[index];
          this.msg.estado=true;
      },
      activeOferta:function(index){
          var oferta = this.ofertas[index];
          var novoEstado = (oferta.estado=="V") ? "F":"V";
          
          this.$http.get("./app/ofertas.php?"+
          `action=AlterarEstado&idOferta=${oferta.id}&Estado=${novoEstado}`)
            .then(function(response){
              if(response.data=="true"){
                  
                  oferta.estado=novoEstado;
                  
              }else{
                  alert('Erro ao Alterar estado da Oferta'+response.data);
              }
          });
      },
      update:function(){
        this.$emit('emit-update');
      }
  },
  
})
</script>
<div id="appTbl">
<tbl-ofertas :ofertas="ofertas" @emit-update="update"></tbl-ofertas>
</div>
<script>
var appTbl = new Vue({
    el:"#appTbl",
    data:{
        ofertas:[],
    },
    methods:{
      update:function(){
        this.$http.get('./app/ofertas.php?action=list').then(function(response) {
           
           this.ofertas = response.data;
        });
      }
    },
    beforeMount:function(){
        this.$http.get('./app/ofertas.php?action=list').then(function(response) {
           this.ofertas = response.data;
           
        });
    }

})

</script>