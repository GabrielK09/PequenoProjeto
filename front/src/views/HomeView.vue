<template>
  <div class="flex bg-indigo-500 text-white p-4 mb-0 border-b-2 border-b-white">
    <h1 class="text-2xl font-bold">Grupo Roxo!</h1>

    <div class="flex text-white">
      <span class="bg-indigo-500 font-bold p-1  cursor-pointer hover:text-gray-200">Usuários</span>

    </div>

  </div>

  <FormReport 
  />
  <!--img
    src="https://s2-g1.glbimg.com/kpFpybZz9WaqZDJUkar4-6sTs6k=/0x0:1777x937/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/R/2/SSQNLtTMOVDwtVzCiqGQ/vingadores-guerra-infinita-thanos.jpg"
    width="200px"
    class="m-4" 

  /-->

</template>

<script>
  import axios from "axios";
  import FormReport from "./components/FormReport.vue";
  
  export default {
    name: 'HomeView',
   
    data(){
      return {

      }

    },
    components: {
      FormReport

    },
    methods: {
      async test()
      {
        try {
          const response = await axios.get('https://viacep.com.br/ws/89711226/json/')        
          console.log(response.data)  

        } catch (error) {
          console.error(error)

        }
      }
    },

  }
</script>
