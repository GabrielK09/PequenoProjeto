<template>
    <h3>Seu total de ligações: {{ total_calls }}</h3>

    <div>
        <button
            @click="add"
            class="rounded-lg text-white bg-indigo-600  p-2"
        >
            Adicionar Ligação
        </button>

    </div>

    <form @submit.prevent="filterCalls">
        <label for="start">Data Inicial:</label>
        <input 
            type="date"
            id="start"
            v-model="form.start"   
        />

        <label for="end">Data Final:</label>
        <input 
            type="date"
            id="end"
            v-model="form.end"   
        />

        <button type="submit">Filtrar</button>
    </form>

    

    <div v-if="total_filter_calls > 0">Todas as ligações do perído: {{ form.start }} até {{ form.end }}: {{ total_filter_calls }}</div>

</template>

<script>
    import axios from 'axios';
    
    export default {
        name: "CallsView",
        data(){
            return {
                form: {
                    start: null,
                    end: null,

                },
                total_calls: null,
                total_filter_calls: null,
                api: process.env.VUE_APP_API_URL,
             
            }
        },

        methods: {
            async getCalls(){
                const response = await axios.get(`${this.api}/call/all/${this.user_id}`);
                this.total_calls = response.data.calls
                console.log(response.data.calls)

            },

            async filterCalls(){
                const form = new FormData

                form.append('start', this.form.start)
                form.append('end', this.form.end)

                const response = await axios.post(`${this.api}/call/filter/${this.user_id}`, this.form);
                console.log(response.data.filter)

                if(response.data.filter === null)
                {
                    alert('Sem ligações para esse período')
                }
                
                this.total_filter_calls = response.data.filter
            },

            async add(){
                try {
                    const response = await axios.put(`${this.api}/call/add/${this.user_id}`, {
                        call: 1
                    })
                    
                    if(response.data.success === true)
                    {
                        this.getCalls()
                    }

                } catch (error) {
                    console.error(error)          

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
        
            console.log(this.user_id)   
        }
    }

</script>