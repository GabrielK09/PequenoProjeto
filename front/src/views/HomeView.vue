<template>
  <div class="bg-indigo-500 text-white p-4">
    <h1 class="text-2xl font-bold">Hello Grupo Roxo!</h1>

  </div>

  <div class="mt-0 h-1 w-1">
    <span class="bg-indigo-600 font-bold">Usuários</span>

  </div>

</template>

<script>
  import axios from "axios";
  
  export default {
    name: 'HomeView',
   
    data(){
      return {

      }
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
