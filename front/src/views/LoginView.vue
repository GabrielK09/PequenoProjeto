<template>
    <header class="">
        <h1 class="">Login</h1>

    </header>

    <form
        @submit.prevent="getData"
        class="flex"
        
    >
        <input 
            type="text"
            v-model="login"
            placeholder="Insirá seu login"
        />

        <input 
            type="text"
            v-model="password"
            placeholder="Insirá sua senha"
        />

        <div v-if="message" class="text-black">
            {{  message }}
        </div>
        
        <button type="submit">Entrar</button>
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "LoginView",

        data()
        {
            return {
                login: null,
                password: null,
                message: null || this.$route.query.message,

                api: process.env.VUE_APP_API_URL
            }
        },

        methods: {
            async getData()
            {
                try {
                    const data = {
                        login: this.login,
                        password: this.password,

                    }
                    
                    this.message = 'Carregando...'
                    const response = await axios.post(`${this.api}/login`, data);

                    if(response.data.success === false)
                    {
                        this.message = response.data.message
                        console.log(response.data)
                    }

                    if(response.data.success === true)
                    {
                        this.$router.push({ 
                            name: 'Home',
                            params: { 
                                user_id: response.data.user_id
                            } 

                        })

                    }                    

                } catch (error) {
                    console.error('Erro interno ao fazer login', error)
                    
                }
            }
        },
        mounted(){}
    }

</script>