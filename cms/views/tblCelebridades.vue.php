<script src="./libs/vue/vue.js"></script>
<script src="./libs/vue/vue-resource.js"></script>
<script src="./libs/jqueryForm/form.js"></script>

<template id="msgeditcelebridade">
<div>
<div role="dialog" style='min-width:502px;' class="Alert">
    <div class="AlertTitulo">ADD. Celebridade</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
      <form id='formeditCelebridade' method='post' enctype="multipart/form-data" action='./app/celebridades.php'>
            <table  style="min-width: 100%;">
              <tr>
                <td><label>Titulo:</label><input type="hidden" v-model="celebridade.id" name="idCelebridade"></td>
                <td><input name="titulo" v-model='celebridade.titulo' type="text" ></td>
              </tr>
              <tr>

                <td><label>Celebridade:</label></td>
                <td><input name="nome" v-model='celebridade.celebridade' type="text" ></td>
              </tr>
              <tr>
                <td><label>Url:</label></td>
                <td><input name="url" v-model='celebridade.url' type="text" ></td>
              </tr>
              <tr>
                <td><label>Imagem:</label></td>
                <td>
                    <table>
                        <tr><td><img height="128" width="128" :src="'../imgup/'+celebridade.img"></td></tr>
                        <tr><td><input  name="Imagem" type="file" @change='processFile($event)' ></td></tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td><label>Estado: </label></td>
                <td><select name="estado" v-model='celebridade.estado'>
                      <option value='V'>Ativo</option>
                      <option value='F'>Desativado</option>
                    </select></td>
              </tr>
              <tr>
                  <td colspan="2">
                    <button @click.stop.prevent='descrisaotexto=true' class="btn Esquerda"> Descrição </button><button @click.stop.prevent='descrisaotexto=false|desview()' class="btn Direita"> Ver </button>
                    <input type="text" class='hidden' name="action" value='editar'>
                  </td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name="conteudo"
                    title='[titulo][/titulo],[center][/center],[justificado][/justificado]'
                     v-model='celebridade.conteudo' v-show='descrisaotexto' 
                     style="display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px;"></textarea>
                    <div  v-html='descrisaoview' v-show='!descrisaotexto' style="font-size: 16px; display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px; overflow: auto; padding-bottom:10px; background-color:#eee;"></div>
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
Vue.component('msgedit-celebridade',{
  template:'#msgeditcelebridade',
  props:['celebridade'],
  data(){
    return{
      oi:'OLá',
      descrisaotexto:true,
      descrisaoview:'',
    }
  },
  methods:{
    cadastrar:function(){
      console.log(this.celebridade.img);
      $('#formeditCelebridade').ajaxForm({
        success:function(msg){
          alert("Msg: "+msg);
          console.log(msg);
        },
     }).submit();
    },
    fechar:function(){
      this.$emit("emit-fechar");
    },
    desview:function() {
         this.$http.get('./libs/bbcode.php?transformar='+this.celebridade.conteudo).then(function(response){
            this.descrisaoview=response.data;
         });
    },
  }
});

</script>

<template id='msgaddCelebridade'>
<div>
<div role="dialog" style='min-width:502px;' class="Alert">
    <div class="AlertTitulo">ADD. Celebridade</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
      <form id='formaddCelebridade' method='post' enctype="multipart/form-data" action='./app/celebridades.php'>
            <table  style="min-width: 100%;">
              <tr>
                <td><label>Titulo:</label></td>
                <td><input name="titulo" v-model='celebridade.titulo' type="text" ></td>
              </tr>
              <tr>
                <td><label>Celebridade:</label></td>
                <td><input name="nome" v-model='celebridade.nome' type="text" ></td>
              </tr>
              <tr>
                <td><label>Url:</label></td>
                <td><input name="url" v-model='celebridade.url' type="text" ></td>
              </tr>
              <tr>
                <td><label>Imagem:</label></td>
                <td><input name="Imagem" type="file" @change='processFile($event)' ></td>
              </tr>
              <tr>
                <td><label>Estado: </label></td>
                <td><select name="estado" v-model='celebridade.estado'>
                      <option value='V'>Ativo</option>
                      <option value='F'>Desativado</option>
                    </select></td>
              </tr>
              <tr>
                  <td colspan="2">
                    <button @click.stop.prevent='descrisaotexto=true' class="btn Esquerda"> Descrição </button><button @click.stop.prevent='descrisaotexto=false|desview()' class="btn Direita"> Ver </button>
                    <input type="text" class='hidden' name="action" value='criar'>
                  </td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name="conteudo"
                    title='[titulo][/titulo],[center][/center],[justificado][/justificado]'
                     v-model='celebridade.conteudo' v-show='descrisaotexto' 
                     style="display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px;"></textarea>
                    <div  v-html='descrisaoview' v-show='!descrisaotexto' style="font-size: 16px; display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px; overflow: auto; padding-bottom:10px; background-color:#eee;"></div>
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
Vue.component('msgadd-celebridades',{
  template:'#msgaddCelebridade',
  data(){
    return{
      celebridade:{
        titulo:'',
        nome:'',
        url:'',
        estado:'',
        conteudo:'',
        Imagem:'',
        action:'criar',
      },
      descrisaotexto:true,
      descrisaoview:'',
    }
  },
  methods:{
    cadastrar:function(){
      console.log(this.celebridade);
      let celebridade = {...this.celebridade};
      var nova = this.nova;
     $('#formaddCelebridade').ajaxForm({
        success:function(msg){
          if(msg=="true"){
            alert("Entrevista/Celebridade Gravada com sucesso");
            nova();
          }else{
            alert("Um erro Ocorreu:"+msg);
          }
        },
     }).submit();
    },
    processFile(event) {
      this.celebridade.Imagem = event.target.files[0]
    },
    nova:function(){
      this.$emit('emit-novacelebridade');
    },
    fechar:function(){
      this.$emit('emit-addcelebridadefechar');
    },
    desview:function() {
         this.$http.get('./libs/bbcode.php?transformar='+this.celebridade.conteudo).then(function(response){
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
                <td><label>Celebridade:</label></td>
                <td><input disabled type="text" :value="msg.celebridade"></td>
              </tr>
              <tr>
                <td><label>link:</label></td>
                <td><input disabled type="text" :value="msg.url"></td>
              </tr>
              <tr>
                <td><label>Criado em:</label></td>
                <td><input disabled type="text" :value="msg.dtCriacao"></td>
              </tr>
              <tr>
                <td colspan="2">
                  <label> Conteudo: </label>
                  <div style="border:solid 1px black; margin:2px; padding:2px;" v-html="msg.conteudo"></div>
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

<template id="tblbancas">
<div>
<msgedit-celebridade :celebridade='msgedit' @emit-fechar='fecharEditCelebridade' v-show="msgeditcelebridadestatus"></msgedit-celebridade>
<msgadd-celebridades @emit-novacelebridade='update' v-show='msgaddcelebridadestatus' @emit-addcelebridadefechar='fecharAddCelebridade'></msgadd-celebridades>
<msgver :msg='msg'></msgver>
<span  @click="addCelebridade()" style="display: block; margin: 4px; font-size: 22px; padding-top: 10px; padding-left: 10px;"><i class="fas fa-store-alt"></i>Adicionar celebridade/entrevista</span>

<table cellpadding="5" width="942" style="margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
<thead style="display:block; border-bottom: solid 1px black;">
    <tr>
        <th style="padding:7px; width: 180px; border-right:solid 1px black; display:inline-block;">Titulo:</th>
        <th style="padding:7px; width: 150px; border-right:solid 1px black; display:inline-block;">Celebridade:</th>
        <th style="padding:7px; width: 103px; border-right:solid 1px black; display:inline-block;">Link:</th>
        <th style="padding:7px; width: 103px; border-right:solid 1px black; display:inline-block;">Criado:</th>
        <th style="padding:7px; width: 70px; border-right:solid 1px black; display:inline-block;">Estado:</th>
        <th style="padding:7px; width: 132px; display:inline-block;">Opções:</th>
    </tr>
</thead>
<tbody>
    <tr style="border-bottom:solid 1px;" v-for="(celebridade,index) in celebridades">
        <td style="padding:2px; width: 192px; display:inline-block; text-align: center;">{{celebridade.titulo}}</td>
        <td style="padding:2px; width: 160px; display:inline-block; text-align: center;">{{celebridade.celebridade}}</td>
        <td style="padding:2px; width: 115px; display:inline-block; text-align: center;"><a :href='celebridade.url'>Link</a></td>
        <td style="padding:2px; width: 113px; display:inline-block; text-align: center;">{{celebridade.dtCriacao}}</td>
        <td style="padding:2px; width: 70px; display:inline-block; text-align: center;">
            <img style="display:block; margin-left:auto; margin-right:auto;" v-if="celebridade.estado=='V'" @click="activeCelebridade(index)" src='./img/Accept-icon.png'>
            <img style="display:block; margin-left:auto; margin-right:auto;" v-else @click="activeCelebridade(index)" src='./img/disable.png'>
        </td>
        <td style="padding:2px; width: 264px; display:inline-block; text-align: center;">
            <a href="#"><label @click="exibirCelebridade(index)"><i class="far fa-eye"></i>Exibir</label></a>
            <a href="#"><label @click="delCelebridade(index)"><i class="far fa-trash-alt"></i>Deletar</label></a>
            <a href="#"><label @click="editCelebridade(index)"><i class="fas fa-edit"></i>Editar</label></a>
        </td> 
    </tr>
</tbody>
</table>
</div>
</template>
<script>
Vue.component('tbl-celebridades', {
  template: "#tblbancas",
  props: ['celebridades'],
  data(){
      return{
          msg:{
            estado:false,
            msg:'oi',
          },
          msgaddcelebridadestatus:false,
          msgeditcelebridadestatus:false,
          msgedit:new Object(),
      }
  },
  methods:{
      fecharEditCelebridade:function(){
        this.msgeditcelebridadestatus=false;
      },
      editCelebridade:function(index){
        this.msgeditcelebridadestatus=true;
        console.log(this.celebridades[index]);
        this.msgedit= this.celebridades[index];
      },
      delCelebridade:function(index){
        var celebridade = this.celebridades[index];
        var update = this.update;
        this.$http.get("./app/celebridades.php?"+
              `action=deletar&idCelebridade=${celebridade.id}`).then(function(response){
              if(response.data=="true"){
                  alert('Celebridade/Entrevista Deletada!!');
                  update();
              }else{
                alert(response.data);
                console.log(response.data);
              }
          });
      },
      addCelebridade:function(){
        this.msgaddcelebridadestatus= true;
      },
      fecharAddCelebridade:function(){
         this.msgaddcelebridadestatus= false;
      },
      exibirCelebridade:function(index){
        this.msg = {...this.celebridades[index]};
      },
      activeCelebridade:function(index){
        var entrevista = this.celebridades[index];
        var novoEstado = "";
        entrevista.estado=="V" ? novoEstado= "F" : novoEstado= "V";
        entrevista.estado=novoEstado;
        this.$http.get("./app/celebridades.php?"+
              `action=AlterarEstado&idCelebridade=${entrevista.id}&Estado=${novoEstado}`).then(function(response){
              if(response.data!=="true"){
                  alert('Erro ao AlterarEstado da Entrevista!!');
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
<tbl-celebridades :celebridades="celebridades" @emit-update="update"></tbl-celebridades>
</div>
<script>
var appTbl = new Vue({
    el:"#appTbl",
    data:{
        celebridades:[],
    },
    methods:{
      update:function(){
        this.$http.get('./app/celebridades.php?action=list').then(function(response) {
           this.celebridades = response.data;
        });
      }
    },
    beforeMount:function(){
        this.$http.get('./app/celebridades.php?action=list').then(function(response) {
           this.celebridades = response.data;
        });
    }

})

</script>