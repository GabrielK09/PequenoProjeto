<template>
    <div class="p-4 sm:ml-32">
        <header class="flex bg-gray-800 p-4">
            <h1 class="text-white text-xl">Usuário: {{ user }} está editando</h1>

        </header>
        
        <SideBar
            :user_id="this.user_id"
            
        /> 

        <FormUpdate
            v-if="showUpdate"
            :user_id="this.user_id"
            :card_id="this.card_id"
             
        />

        <a @click="backHome" class="cursor-pointer">Voltar</a>
        
    </div>
    
</template>

<script>
    import SideBar from "@/components/SideBar.vue";
    import FormUpdate from "./FormUpdate.vue";    
    import axios from "axios";

    export default {
        
        name: "UpdateView",
        data(){
            return {
                user: null,
                showUpdate: false,
                api: process.env.VUE_APP_API_URL
            }
        },
        props: {
            user_id: {
                type: String,
                required: true
            },

            card_id: {
                type: String,
                required: true
            }
        },
        methods: {
            async getUser()
            {
                try {
                    const userData = await axios.get(`${this.api}/user/${this.user_id}`)
                    this.user = userData.data.name
                    if(userData.data.name === undefined || userData.data.name === null)
                    {
                        this.$router.push({ name: "Login", message: { message: "Usuário não encontrado" } })

                    } 
                } catch (error) {
                    console.error('error', error)
                }

            },

            backHome(){
                this.$router.push({
                    name: "Home",
                    params: {
                        user_id: this.user_id
                    }
                })
            }
        },

        components: {
            SideBar,
            FormUpdate

        },
        mounted(){
            console.log(this.$route.path)
            this.getUser()
        }
    }   
</script>