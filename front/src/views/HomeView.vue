<template>  
  <aside id="default-sidebar" class="fixed top-0 left-0 z-1 w-32 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
          <li>
            <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">              
                <button 
                  @click="report()"
                  class="ml-4"
                >Reportar</button>

              </span>
            
          </li>         
      </ul>
    </div>
  </aside>

  <div class="p-4 sm:ml-32">
    <header class="flex bg-gray-800 p-4">
      <h1 class="text-white text-xl">ClickUp Grupo Roxo, Olá {{ user }}</h1>

    </header>
  
    <FormReport
      v-if="this.show"
      :show="this.show"
      :user_id="this.user_id"
    />
  </div>

  

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
        show: true,
        user: null,
        api: process.env.VUE_APP_API_URL
      }

    },
    components: {
      FormReport

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
      report() {
        this.show = !this.show

      }
    },
    mounted()
    {
      this.getUser()

    }
  }
</script>
