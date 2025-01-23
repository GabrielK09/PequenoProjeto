<template>
    <h1>Técnicos</h1>
    <div class="">
        <div v-for="technic in technicians">
            Técnico: {{ technic.name }} |
            Ligações: {{ technic.total_call }}
        </div>
    </div>
</template> 

<script>
import axios from 'axios';

    export default {
        name: "TechniciansView",
        data(){
            return {
                technicians: [],
                api: process.env.VUE_APP_API_URL
            }
        },  

        methods: {
            async getAll(){
                try {
                    const response = await axios.get(`${this.api}/all/users`)
                    this.technicians = response.data.all

                } catch (error) {
                    console.error(error)
                }
            }
        },

        props: {
            showTechnicians: {
                type: Boolean,
                required: true

            }
        },

        mounted(){
            if(this.$route.name !== "Home")
            {
                console.log('Vai redirecionar para Home')
                this.$router.push({
                    name: "Home",
                    params: {
                        user_id: this.user_id
                    }
                })
            }
            this.getAll()
        }
        
    }
</script>   