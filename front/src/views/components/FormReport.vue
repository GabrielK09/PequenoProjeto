<template>
    <h1>Aq</h1>
    <div>
        <form action="">
            <label>Título do report: </label>
            <input 
                type="text" 
                class="border-2 border-black rounded-md"
                v-model="title"
                
            />
            <br>

            <label>Descrição: </label>
            <input 
                type="text" 
                class="border-2 border-black rounded-md"
                v-model="description"
                
            />
            <br>

            <select>
                <option value="" disabled selected>Selecione o Grupo</option>
            </select>
            <br>
        
            <input type="file"
            
            />

        </form>
    </div>
</template>

<script>
    export default {
        name: "FormReport",

    }

</script>