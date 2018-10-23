<script src="./libs/vue/vue.js"></script>
<script src="./libs/vue/vue-resource.js"></script>
<script src='./libs/leaflet/leaflet.js'></script>
<link rel="stylesheet" href="./libs/leaflet/leaflet.css">
<template id='msgaddbanca'>
<div>

<div role="dialog" class="Alert">
    <div class="AlertTitulo">ADD. Banca</div>
    <div class="Alertcontent">
      <div class="msgConteudo">
            <table  style="min-width: 100%;">
              <tr>
                <td><label>Nome:</label></td>
                <td><input  v-model='banca.nome' type="text" ></td>
              </tr>
              <tr>
                <td><label>Estado:</label></td>
                <td><input v-model='banca.uf' type="text" ></td>
              </tr>
              <tr>
                <td><label>Cidade:</label></td>
                <td><input  v-model='banca.cidade' type="text" ></td>
              </tr>
              <tr>
                <td><label>Bairro:</label></td>
                <td><input v-model='banca.bairro' type="text" ></td>
              </tr>
              <tr>
                <td><label>Endereço:</label></td>
                <td><input  v-model='banca.endereco' type="text"></td>
              </tr>
              <tr>
                <td><label>Telefone:</label></td>
                <td><input v-model='banca.telefone'  type="text"></td>
              </tr>
              <tr>
                <td><label>Dono:</label></td>
                <td><select v-model='banca.dono'>
                    <option>Selecine um Dono</option>
                    <option :value='item.id' :title='item.email' v-for='(item,index) in donos'> {{item.nome}}</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td><label>Horario:</label></td>
                <td><input v-model='banca.horario' type="text"></td>
              </tr>
              <tr>
                <td><label>Estado:</label></td>
                <td><input v-model='banca.estado'  type="text"></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div>
                    <button @click='descrisaotexto=true' class="btn Esquerda"> Descrição </button><button @click='descrisaotexto=false|desview()' class="btn Direita"> Ver </button>
                    <textarea title='[titulo][/titulo],[center][/center],[justificado][/justificado]' v-model='banca.descrisao' v-show='descrisaotexto' style="background-color:#eee; display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px;"></textarea>
                    <div  v-html='descrisaoview' v-show='!descrisaotexto' style="font-size: 16px; display: inline-block; margin-top:10px; resize: none; border: solid 1px black; padding: 4px; width: 482px; height:137px; overflow: auto; padding-bottom:10px;"></div>
                  </div>
                </td>
              </tr>
            </table>
            <button @click='mapa()' class="btn Esquerda"> Refresh MAPA </button>
            <div style='height:259px; width:100%;' id="mapaBanca">
                      
            </div>
      </div>
      <button @click="cadastrar()" class="Esquerda btn" style="height:32px; margin:8px; margin-right:16px;">Salvar</button>
      <button @click="fechar()" class="Direita btn" style="height:32px; margin:8px; margin-right:16px;">Fechar</button>
    </div>
</div>


</div>
</template>
<script>
Vue.component('msgaddbanca',{
  template:'#msgaddbanca',
  data(){
    return{
      banca:{
        nome:'',
        uf:'',
        cidade:'',
        bairro:'',
        endereco:'',
        telefone:'',
        dono:'',
        horario:'',
        estado:'',
        descrisao:'',
        action:'criar',
      },
      descrisaotexto:true,
      descrisaoview:'',
      location:'',
      donos:[],
      map:0,
    }
  },
  methods:{
    cadastrar:function(){
       var novaBanca =   this.banca;
       console.log(novaBanca);
    $.ajax({
          method: "post",
          url: "./app/bancasDonos.php",
          data: novaBanca,
          success: function (msg) {
               alert(msg);
               console.log(msg);
          }
           });
    },
    fechar:function(){
      //alert('Fechar');
      this.$emit('emit-fecharaddbanca');
    },
    definelocalizacao:function(local){
      var location = local.replace('LatLng(','').replace(')','');//salvando somente a localização no mapa
      //alert('location: '+location);
      this.banca.location = location;
    },
    desview:function() { 
         this.$http.get('./libs/bbcode.php?transformar='+this.banca.descrisao).then(function(response){
            this.descrisaoview=response.data;
          });
      },
    mapa:function(){
      var funcao = this.definelocalizacao;
      //setando o ponto de visualização de inicio do mapa para as cordenadas barueri
            this.map = L.map('mapaBanca').setView([-23.53755, -46.802616], 13);
            //passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
                    {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ',
                        maxZoom: 18, /* mandando o zom padrão como parametro*/
                        id: 'mapbox.streets-satellite', /* Passado como parametro ao mapbox.com  o tipo de mapa que nos queremos
                         https://www.mapbox.com/api-documentation/#maps   */
                        accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(this.map);



      var popup = L.popup();
      var map = this.map;
      function onMapClick(e) {
          popup
              .setLatLng(e.latlng)
              .setContent("Localização: " + e.latlng.toString())
              .openOn(map);
              funcao(e.latlng.toString());
      }
      map.on('click', onMapClick);
    }
  },
  mounted:function(){
        this.$http.get('./app/bancasDonos.php?action=listar').then(function(response) {
           this.donos=response.data;

   });
  }
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
      msg:function(NovaMsg) {
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
  },
})

</script>

<template id="tblbancas">
<div>
<msgaddbanca v-show='msgaddbancastatus' @emit-fecharaddbanca='closeAddBanca' ></msgaddbanca>
<msgver :msg="msg.msg"></msgver>
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
        <td style="padding:2px; width: 274px; display:inline-block; text-align: center;">
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
          msgaddbancastatus:false,
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
                  alert('Erro ao Deletar Banca');
              }
          });
      },
      closeAddBanca:function(){
        this.msgaddbancastatus= false;
      }
      ,
      editBanca:function(index){
        alert('Editar banca');  
      },
      exibirBanca:function(index){
        //alert('Exibir banca');
        this.msg.msg={...this.Bancas[index]};

      },
      addBanca:function(){
          //alert(" Adicionar Banca");  
          this.msgaddbancastatus= true;
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