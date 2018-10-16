<script src="./libs/vue/vue.js"></script>
<script src="./libs/vue/vue-resource.js"></script>
<template id="msgadd">
<div>
<div role="dialog" v-show="mostrar" class="Alert">
    <div class="AlertTitulo">Add. Usuario</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
            
      </div>
      <button @click="fechar()" class="Direita btn" style="height:32px; margin:8px; margin-right:16px;">Fechar</button>
    </div>
</div>
<div>
</template>
<script>
Vue.component('msgadd',{
  template:'#msgadd',
  props:['status'],
  data:function(){
    return{
      mostrar:true
    }
  },
  methods:{
    fechar:function(){
      this.mostrar=false;
    }
  },
  watch:{
    status:function(Novostatus){
      console.log('Alterado: '+Novostatus);
      this.mostrar=Novostatus.status;
    }
  }
})
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
                <td><input disabled type="text" :value="msg.nome"></td>
              </tr>
              <tr>
                <td><label>Estado:</label></td>
                <td><input disabled type="text" :value="msg.uf"></td>
              </tr>
              <tr>
                <td><label>Cidade:</label></td>
                <td><input disabled type="text" :value="msg.cidade"></td>
              </tr>
              <tr>
                <td><label>Telefone:</label></td>
                <td><input disabled type="text" :value="msg.telefone"></td>
              </tr>
              <tr>
                <td><label>Dono:</label></td>
                <td><input disabled type="text" :value="msg.dono"></td>
              </tr>
              <tr>
                <td><label>Endereço:</label></td>
                <td><input disabled type="text" :value="msg.logradouro"></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div v-html="msg.descrisao"></div>
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
      status:false
    }
  },
   watch: { 
      msg:function(NovaMsg) { // watch it
         //console.log('novo valor');
         this.$http.get('./libs/bbcode.php?transformar='+NovaMsg.descrisao).then(function(response){
           //alert('oi'+response.data);
           //console.log(response);
           NovaMsg.descrisao=response.data;
           //msg.descrisao = response.data;
           
          });
         this.status=true;
      }
   },
    methods:{
      fechar:function(){
          //alert('Fechar');
          this.status=false;
          //this.estado=false;
      }
  }
})

</script>

<template id="tblbancas">
<div>
<msgver :msg="msg.msg" ></msgver>
<msgadd :status="add"/>
<span  @click="addBanca()" style="display: block; margin: 4px; font-size: 22px; padding-top: 10px; padding-left: 10px;"><i class="fas fa-store-alt"></i>Adicionar Banca </span>

<table cellpadding="5" width="942" style="margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
<thead style="display:block; border-bottom: solid 1px black;">
    <tr>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Nome:</th>
        <th style="padding:7px; width: 103px; border-right:solid 1px black; display:inline-block;">Cidade:</th>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Telefone:</th>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Horario:</th>
        <th style="padding:7px; width: 70px; border-right:solid 1px black; display:inline-block;">Estado:</th>
        <th style="padding:7px; width: 132px; display:inline-block;">Opções:</th>
    </tr>
</thead>
<tbody>
    <tr style="border-bottom:solid 1px;" v-for="(banca,index) in Bancas">
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.nome}}</td>
        <td style="padding:2px; width: 103px; display:inline-block; text-align: center;">{{banca.cidade}}</td>
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.telefone}}</td>
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.horario}}</td>
        <td style="padding:2px; width: 70px; display:inline-block; text-align: center;">
            <img style="display:block; margin-left:auto; margin-right:auto;" v-if="banca.estado=='V'" @click="activeBanca(index)" src='./img/Accept-icon.png'>
            <img style="display:block; margin-left:auto; margin-right:auto;" v-else @click="activeBanca(index)" src='./img/disable.png'>
        </td>
        <td style="padding:2px; width: 300px; display:inline-block; text-align: center;">
            <a href="#"><label @click="exibirBanca(index)"><i class="far fa-eye"></i>Exibir</label></a>
            <a href="#"><label @click="delBanca(index)"><i class="far fa-trash-alt"></i>Deletar</label></a>
            <a href="#"><label @click="editBanca(index)"><i class="fas fa-edit"></i>Editar</label></a>
        </td> 
    </tr>
</tbody>
</table>
</div>

</template>
<script>
Vue.component('tblbancas', {
  template: "#tblbancas",
  props: ['Bancas'],
  data(){
      return{
          msg:{
            estado:false,
            msg:'oi',
          },
          add:{
            status:false,
            data:0;
          },
      }
  },
  methods:{
      delBanca:function(index){
          //alert('Deletar Banca '+this.Bancas[index].nome);
          var idBanca = this.Bancas[index].id;
          //this.Bancas.splice(index, 1);
          this.$http.get('./app/bancas.php?action=deletar&idBanca='+idBanca).then(function(response){
              //alert(response.data);
              if(response.data=="true"){
                  this.Bancas.splice(index, 1);
              }else{
                  alert('Erro ao Deletar usuario');
              }
          });
      },
      editBanca:function(index){
        alert('Editar banca');  
      },
      exibirBanca:function(index){
        //alert('Exibir banca');
        this.msg.msg={...this.Bancas[index]};

      },
      addBanca:function(){
          //alert(" Adicionar Banca");  
          this.add={status:true,data:new Date};
      },
      activeBanca:function(index){
          var Banca = this.Bancas[index];
          var novoEstado = "";
          Banca.estado=="V" ? novoEstado= "F" : novoEstado= "V";
          
          //alert(`../app/bancas.php?action=AlterarEstado&idBanca=${Banca.id}&Estado=${novoEstado}`);
          this.$http.get("./app/bancas.php?"+
          `action=AlterarEstado&idBanca=${Banca.id}&Estado=${novoEstado}`).then(function(response){
              //alert(response.data);
              if(response.data=="true"){
                  //alert('Update');
                  Banca.estado=`${novoEstado}`;
                  //this.Bancas.splice(index, 1);
              }else{
                  alert('Erro ao Deletar usuario');
              }
          });
      }
  }
})
</script>
<div id="appTbl">
<tblbancas :Bancas="Bancas"></tblbancas>
</div>
<script>
var appTbl = new Vue({
    el:"#appTbl",
    data:{
        Bancas:[]
    },
    beforeMount:function(){
        this.$http.get('./app/bancas.php?action=list').then(function(response) {
           this.Bancas = response.data;
        });
    }

})

</script>