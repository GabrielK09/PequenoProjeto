<template>
    <h3>Seu total de ligações: {{ total_calls }}</h3>
    <h3>Seu total de ligações de entrada: {{ total_calls_input }}</h3>
    <h3>Seu total de ligações de saida: {{ total_calls_exit }}</h3>

    <div>
        <button
            @click="addInput"
            class="rounded-lg text-white bg-indigo-600  p-2"
        >
            Adicionar Ligação De Entrada
        </button>

    </div>

    <div class="mt-3 mb-2">
        <button
            @click="addExit"
            class="rounded-lg text-white bg-indigo-600 p-2"
        >
            Adicionar Ligação De Saída
        </button>

    </div>

    <form @submit.prevent="filterCalls">
        <label for="start">Data Inicial:</label>
        <input 
            type="date"
            id="start"
            v-model="form.start"   
            required
        />

        <label for="end">Data Final:</label>
        <input 
            type="date"
            id="end"
            v-model="form.end"   
            required
        />

        <br>
        <button 
            type="submit"    
            class="rounded-lg text-white bg-indigo-600 p-2"
        >
            Filtrar
        </button>
    </form>

    <div v-if="total_filter_calls > 0">Todas as ligações do perído: {{ form.start }} até {{ form.end }}: {{ total_filter_calls }}</div>

</template>

<script>
    import axios from 'axios';
    
    export default {
    name: "CallView",
        data(){
            return {
                form: {
                    start: null,
                    end: null,
                    param: null

                },
                total_calls: null,
                total_calls_input: null,
                total_calls_exit: null,

                total_filter_calls: null,
                api: process.env.VUE_APP_API_URL,
             
            }
        },

        methods: {
            async getCalls(){
                try {                    
                    const response = await axios.get(`${this.api}/call/all/${this.user_id}`);
                    this.total_calls = response.data.calls.total_call
                    this.total_calls_input = response.data.calls.total_call_input
                    this.total_calls_exit = response.data.calls.total_call_exit

                } catch (error) {
                    console.error('erro: getCalls ', error)
                }

            },

            async filterCalls(){
                try {                    
                    const form = new FormData

                    form.append('start', this.form.start)
                    form.append('end', this.form.end)

                    console.log(this.form)
                    const response = await axios.post(`${this.api}/call/filter/${this.user_id}`, this.form);
                    console.log(response.data.filter)

                    if(response.data.filter === null)
                    {
                        alert('Sem ligações para esse período')
                    }
                    
                    this.total_calls_input = response.data.filter.after_call_input
                    this.total_calls_exit = response.data.filter.after_call_exit 

                } catch (error) {
                    console.log('erro: filterCalls ',error)

                }
            
            },

            async addInput(){
                try {  
                    const response = await axios.put(`${this.api}/call/add_input/${this.user_id}`)
                    console.log(response)
                    if(response.data.success === true)
                    {
                        this.getCalls()
                    }

                } catch (error) {
                    console.error('erro: addInput ', error)          

                }
            },

            async addExit(){
                try {
                    const response = await axios.put(`${this.api}/call/add_exit/${this.user_id}`, {
                        call: 1

                    })
                    
                    if(response.data.success === true)
                    {
                        this.getCalls()
                    }

                } catch (error) {
                    console.error('erro: addExit ', error)                   

                }
            }
        },

        props: {
            showCalls: {
                type: Boolean,
                required: true
            },

            user_id: {
                type: String,
                required: true

            }
        },
        mounted(){
            this.getCalls()
        
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
