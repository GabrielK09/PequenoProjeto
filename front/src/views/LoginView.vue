<template>
    <div>
        <h1>Login</h1>

    </div>

    <form action="">
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

        <div v-if="message">
            {{  message }}
        </div>
        <button type="submit">Entrar</button>
    </form>
</template>

<script>

</script>