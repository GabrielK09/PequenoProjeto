<template>
    <h1>Form Update</h1>
    <div class="mt-5 w-full max-w-xs">
        <form @submit.prevent="updateCard" class="bg-gray-700 shadow-md rounded px-4 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    
                    <input 
                        type="text" 
                        class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Título:"
                        maxlength="120"
                        v-model="form.title"
                        
                    />
                </div>
                
                <div class="mb-4">
                    <input 
                        type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Descrição: "
                        maxlength="255"
                        v-model="form.description"
                        
                    />
                </div>

                <div class="mb-4">
                    <input 
                        type="text" 
                        class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Contato: "
                        maxlength="100"
                        v-model="form.contact"
                        
                    />
                </div>
                
                <div class="mb-2">
                    <input 
                        type="text" 
                        class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Grupo: "
                        maxlength="100"
                        v-model="form.group"
                        
                    />
                </div>

                <button type="submit" class="text-white">
                    Enviar
                    
                </button>
                
            </form>
        </div>
        <p v-if="message" class="text-black"> {{ message }}</p>
</template>

<script>
import axios from 'axios';

    export default {
        name: "FormUpdate",
        data(){
            return {
                form: {
                    user_id: '',
                    title: '',
                    description: '',
                    group: '',
                    contact: '',
                    file: '',
                    status: '',

                },
                
                message: '',
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
            async getCard(){
                try {
                    const response = await axios.get(`${this.api}/card/${this.card_id}`)
                    console.log(response.data)

                    this.form.user_id = response.data.user_id
                    this.form.title = response.data.title
                    this.form.description = response.data.description
                    this.form.group = response.data.group
                    this.form.contact = response.data.contact
                    this.form.file = response.data.file_path
                    this.form.status = response.data.status

                } catch (error) {
                    console.error('erro getCard: ', error)
                }
            },

            async updateCard(){
                try {
                    this.message = 'Carregando...'
                    const form = new FormData()

                    form.append("user_id", this.user_id)
                    form.append("title", this.form.title)
                    form.append("description", this.form.description)
                    form.append("contact", this.form.contact)
                    form.append("group", this.form.group)
                    form.append("status", this.form.status)
                    
                    console.log('new form', this.form)

                    const response = await axios.put(`${this.api}/update/card/${this.card_id}`, this.form);

                    if(response.data.success === true)
                    {
                        this.message = ''
                        alert('Card alterado com sucesso')
                        this.getCard()
                    }

                } catch (error) {
                    console.error('erro updateCard', error)
                }
            }
        },

        mounted(){
            this.getCard()
        }
    }
</script>