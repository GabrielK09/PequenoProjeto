<template>  
  <div class="p-4 sm:ml-32">
    <header class="flex bg-gray-600 p-4 w-full">
      <h1 class="text-white text-xl">ClickUp Grupo <span class="text-purple-700">Roxo</span>, Olá {{ user }}</h1>

    </header>
  
    <SideBar
      :user_id="this.user_id"
      
    /> 
    
  </div>
</template>

<script>
  import axios from "axios";
  import SideBar from "@/components/SideBar.vue";
  
  export default {
    name: 'HomeView',
   
    data(){
      return {
        user: null,
        api: process.env.VUE_APP_API_URL

      }

    },
    components: {
      SideBar

    },
    props: {
      user_id: {
        type: String,
        required: true

      },
    },
    methods: {
      async getUser()
      {
        try {
          const userData = await axios.get(`${this.api}/user/${this.user_id}`)
          this.user = userData.data.name
          if(userData.data.name === undefined || userData.data.name === null)
          {
            this.$router.push({ name: "Login", message: { message: "Usuário não encontrado " } })

          } 
        } catch (error) {
          console.error('Erro ao carregar usuário')

        }

      },

    },
    mounted()
    {
      if(!this.user_id)
      {
        console.log(this.user_id)
        
        this.$router.push({ name: "Login", query: { message: "Dados ausentes" } })  
      } else {
        this.getUser()

      }
    }
  }
</script>
