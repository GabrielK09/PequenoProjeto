<template>
    <h1>technicians</h1>
    <div>
        <div v-for="technic in technicians">
            Técnico: {{ technic.name }} |
            Ligações: {{ technic.call }}
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
            this.getAll()
        }
        
    }
</script>   