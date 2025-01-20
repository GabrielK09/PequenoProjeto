<template>
    <h1>Calls</h1>
    <h3>Total de ligações: {{ total_calls }}</h3>

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
    <div v-else>Sem ligações</div>

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