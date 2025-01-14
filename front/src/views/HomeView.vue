<template>  
  <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-32 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">   
              <span class="ms-3">Dashboard</span>
              
            </a>
          </li>         
      </ul>
    </div>
  </aside>

  <div class="p-4 sm:ml-32">
    <header>
      <h1>Grupo Roxo</h1>
    </header>

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
