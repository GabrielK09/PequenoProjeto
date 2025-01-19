<template>  
  <div class="p-4 sm:ml-32">
    <header class="flex bg-gray-800 p-4">
      <h1 class="text-white text-xl">ClickUp Grupo Roxo, Olá {{ user }}</h1>

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
        show: true,
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

      }
    },
    methods: {
      async getUser()
      {
        const userData = await axios.get(`${this.api}/user/${this.user_id}`)
        this.user = userData.data.name
        console.log(userData.data.name) 
        
      },
      
    },
    mounted()
    {
      this.getUser()

    }
  }
</script>
