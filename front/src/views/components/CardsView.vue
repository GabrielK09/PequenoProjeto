<template>
    <h1>Cards</h1>
    <div v-for="card in cards" class="text-white p-2">
        <div class="bg-gray-400 w-70 h-40 border rounded-lg text-xs p-4">
            <span class="flex flex-row">Titulo: {{ card.title }}</span>
            <span class="flex flex-row">Descricão: {{ card.description }}</span>
            <span class="flex flex-row">{{ card.contact != null ? "Contato" : "Grupo" }}: {{ card.contact ?? card.group  }}</span>
            <span class="flex flex-row">Técnico: {{ card.user }}</span>
            <span class="flex flex-row">Status: {{ card.status }}</span>
            <span class="flex flex-row">Arquivos: {{ card.file_path }}</span>
            
            <button 
                class="border border-blue-950 mt-1 p-1 rounded-xl"
                @click="updateCard(card.id)"
            >
                Editar Card
            </button>

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
                showUpdate: false,
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
            },

            updateCard(id_card){
                console.log(id_card)
                this.$router.push({
                    name: "Update",
                    params: {
                        user_id: this.user_id,
                        card_id: id_card
                        
                    }
                });

            }
        },

        props: {
            showCard: {
                type: Boolean,

            },
            user_id: {
                type: String,
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