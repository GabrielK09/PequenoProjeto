<template>
    <div class="mt-5 w-full max-w-xs">
        <form @submit.prevent="submitForm" class="bg-gray-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2">Título do card: </label>
                <input 
                    type="text" 
                    class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="..."
                    v-model="form.title"
                    
                />
            </div>
            
            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2">Descrição: </label>
                <input 
                    type="text" 
                    class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="..."
                    v-model="form.description"
                    
                />
            </div>
            
            <div class="mb-2">
                <select class="shadow border rounded py-2 px-1" v-model="form.group">
                    <option value="" disabled selected>Selecione o Grupo</option>
                    <option :value="'Alpes'">Alpes</option>
                    <option :value="'Hugo - Aguia'">Hugo - Aguia</option>
                </select>
            </div>
             
            <div class="mb-2">
                <select class="shadow border rounded py-2 px-1" v-model="form.status">
                    <option value="" disabled selected>Status</option>
                    <option :value="'Pendente'">Pendente</option>
                    <option :value="'Resolvido'">Resolvido</option>
                </select>
            </div>

            <div class="max-w-40">
                <label for="fileUpload" class="block text-white text-xl py-2 font-bold rounded cursor-pointer hover:bg-gray-400 w-40">Enviar arquivo</label>
                <input
                    id="fileUpload"
                    type="file"
                    class="hidden"
                    @change="handleFileUpload($event)"
                
                />
                
            </div>
            <button type="submit">Enviar</button>
            <p v-if="message"> {{ message }}</p>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: "FormReport",
        data(){
            return {
                form: {
                    title: null,
                    description: null,
                    group: null,
                    status: null,
                    file: null
                },
                message: null,
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
                const file_ = event.target.files[0];
                const extension = file_.name.split('.').pop().toLowerCase()
                console.log(extension)
                console.log(file_)
                if (file_ ) {
                    if(["rar", "zip", "sql", "fdb", "txt"].includes(extension)){
                        this.form.file = file_;
                        this.message = null;

                    } else {
                        this.message = "Por favor, envie um arquivo RAR/SQL/FDB/TXT.";
                        this.form.file = null;

                    }
                    
                } 
            },
            async submitForm(){
                const form = new FormData()

                form.append("user_id", this.user_id)
                form.append("title", this.form.title)
                form.append("description", this.form.description)
                form.append("group", this.form.group)
                form.append("status", this.form.status)
                form.append("file", this.form.file)

                console.log('Dados', this.form.group)

                const response = await axios.post(`${this.api}/create-card`, form)
                console.log('Response', response)
            }
        },
        mounted()
        {
            console.log(this.user_id)
        }
    }

</script>