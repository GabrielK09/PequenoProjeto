<template>
    <h1>Form Update</h1>
    <form action="">
        
    </form>
</template>

<script>
import axios from 'axios';

    export default {
        name: "FormUpdate",
        data(){
            return {

            }
        },

        methods: {
            async getCard(){
                try {
                    const response = await axios.get()
                    
                } catch (error) {
                    
                }
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

        mounted(){
            
        }
    }
</script>