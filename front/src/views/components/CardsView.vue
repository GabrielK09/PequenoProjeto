<template>
    <h1>Cards</h1>
    <div class="bg-gray-400 w-70 h-40 border rounded-lg text-xs">
        <div v-for="card in cards" class="text-white p-2">
            <span class="flex flex-row">Titulo: {{ card.title }}</span>
            <span class="flex flex-row">Descricão: {{ card.description }}</span>
            <span class="flex flex-row">{{ card.contact != null ? "Contato" : "Grupo" }}: {{ card.contact ?? card.group  }}</span>
            <span class="flex flex-row">Técnico: {{ card.user }}</span>
            <span class="flex flex-row">Status: {{ card.status }}</span>
            <span class="flex flex-row">Arquivos: {{ card.file_path }}</span>
            
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: "CardView",
        data(){
            return {
                cards: [],
                api: process.env.VUE_APP_API_URL
            }
        },

        methods: {
            async getAll(){
                try {
                    const response = await axios.get(`${this.api}/all/cards`)
                    this.cards = response.data.data
                    console.log(response.data.data)
                } catch (error) {
                    console.error(error)

                }

            }
        },

        props: {
            showCard: {
                type: Boolean,
                required: true

            }
        },
        mounted(){
            this.getAll()
        }
    }
</script>