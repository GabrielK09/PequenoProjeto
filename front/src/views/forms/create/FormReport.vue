<template>
    <div class="mt-5 w-full max-w-xs">
        <form @submit.prevent="submitForm" class="bg-gray-700 shadow-md rounded px-4 pt-6 pb-8 mb-4">
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

            <div class="max-w-40">
                <label for="fileUpload" class="block text-white text-base py-2 font-bold rounded cursor-pointer hover:bg-gray-400 w-40">Enviar arquivo</label>
                <input
                    id="fileUpload"
                    type="file"
                    class="hidden"
                    
                    @change="handleFileUpload($event)"
                
                />
                
            </div>
            <button type="submit" class="text-white">
                Enviar
                
            </button>
            
        </form>
        <p v-if="message" class="text-black"> {{ message }}</p>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: "FormReport",
        data(){
            return {
                form: {
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
            show: {
                type: Boolean,
                required: true

            },
            user_id: {
                type: String,
                required: true

            }
        },

        methods: {
            handleFileUpload(event) {
                try {
                    const file_ = event.target.files[0];
                    const extension = file_.name.split('.').pop().toLowerCase()
                    console.log(extension)
                    console.log(file_)
                    if (file_) {
                        if(["rar", "zip", "sql", "fdb", "txt"].includes(extension)){
                            this.form.file = file_;
                            this.message = null;

                        } else {
                            this.message = "Por favor, envie um arquivo RAR/SQL/FDB/TXT.";
                            this.form.file = null;

                        }
                        
                    } else {
                        console.log('Não tem arquivo')
                    }
                } catch (error) {
                    
                }
                
            },
            async submitForm(){
                try {
                    this.message = 'Carregando...'
                    const form = new FormData()

                    form.append("user_id", this.user_id)
                    form.append("title", this.form.title)
                    form.append("description", this.form.description)
                    form.append("group", this.form.group)
                    form.append("contact", this.form.contact)
                    form.append("file", this.form.file)
                    form.append("status", this.form.status)

                    console.log(form)
                    const response = await axios.post(`${this.api}/create-card`, form)
                    if(response.data.success === 'true')
                    {
                        alert('Card criado com successo!')
                        console.log(response.data.success)
                        this.message = ''
                        
                    }
                    console.log('Response', response)

                } catch (error) {
                    alert('Erro ao criar o Card')
                    console.log(this.form.file)
                    console.error('Erro ao criar o card', error.response.data)        
                }
                    
            }
        },

        mounted(){
            if(this.$route.name !== "Home")
            {
                console.log('Vai redirecionar para Home')
                this.$router.push({
                    name: "Home",
                    params: {
                        user_id: this.user_id,

                    }
                })
            }
        }
        
    }

</script>
