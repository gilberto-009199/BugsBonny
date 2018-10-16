<script src="./libs/vue/vue.js"></script>
<script src="./libs/vue/vue-resource.js"></script>

<template id="tblbancas">
<div>
<button @click="addBanca()">Add. Banca</button>
<table   cellpadding="5" width="900px" style="margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
<thead style="display:block; border-bottom: solid 1px black;">
    <tr>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Nome:</th>
        <th style="padding:7px; width: 103px; border-right:solid 1px black; display:inline-block;">Cidade:</th>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Telefone:</th>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Horario:</th>
        <th style="padding:7px; width: 132px; border-right:solid 1px black; display:inline-block;">Estado:</th>
        <th style="padding:7px; width: 132px; display:inline-block;">Opções:</th>
    </tr>
</thead>
<tbody>
    <tr v-for="(banca,index) in Bancas">
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.nome}}</td>
        <td style="padding:2px; width: 103px; display:inline-block; text-align: center;">{{banca.cidade}}</td>
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.telefone}}</td>
        <td style="padding:2px; width: 147px; display:inline-block; text-align: center;">{{banca.horario}}</td>
        <td style="padding:2px; width: 134px; display:inline-block; text-align: center;">
            <img style="display:block; margin-left:auto; margin-right:auto;" v-if="banca.estado=='V'" @click="activeBanca(index)" src='./img/Accept-icon.png'>
            <img style="display:block; margin-left:auto; margin-right:auto;" v-else @click="activeBanca(index)" src='./img/disable.png'>
        </td>
        <td style="padding:2px; width: 178px; display:inline-block; text-align: center;">
            <a href="#"><label @click="delBanca(index)"><i class="far fa-trash-alt"></i>Deletar</label></a>
            <a href="#"><label @click="editBanca(index)"><i class="fas fa-edit"></i>Editar</label></a>
        </td> 
    </tr>
</tbody>
</table>
</div>
</template>
<style>
    
</style>
<script>
Vue.component('tblbancas', {
  template: "#tblbancas",
  props: ['Bancas'],
  data(){
      return{
          msg:'oi'
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
          
      },
      addBanca:function(index){
          alert(" Adicionar Banca"+this.Bancas[index].nome);  
      },
      activeBanca:function(index){
          var Banca = this.Bancas[index];
          var novoEstado = "";
          if(Banca.estado=="V"){
            novoEstado= "F";
          }else{
            novoEstado= "V";
          }
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
{{Nome}}
<tblbancas :Bancas="Bancas"></tblbancas>
</div>
<script>
var appTbl = new Vue({
    el:"#appTbl",
    data:{
        Nome:'oi',
        Bancas:[]
    },
    beforeMount:function(){
        this.$http.get('./app/bancas.php?action=list').then(function(response) {
           this.Bancas = response.data;
        });
    }

})

</script>