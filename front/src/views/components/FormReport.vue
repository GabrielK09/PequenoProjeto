<template>
    <div class="mt-5 w-full max-w-xs">
        <form action="" class="bg-gray-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2">Título do card: </label>
                <input 
                    type="text" 
                    class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="..."
                    v-model="title"
                    
                />
            </div>
            
            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2">Descrição: </label>
                <input 
                    type="text" 
                    class="shadow appearance-none border rounded w-full py-2 px-1 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="description"
                    
                />
            </div>
            
            <div class="mb-2">
                <select class="shadow border rounded py-2 px-1">
                    <option value="" disabled selected>Selecione o Grupo</option>
                </select>
            </div>

            <div class="max-w-40">
                <label for="fileUpload" class="block text-white text-xl py-2 font-bold hover:bg-gray-400 w-40">Enviar arquivo</label>
                <input
                    id="fileUpload"
                    type="file"
                    class="hidden"
                
                />
                <p v-if="fileName"></p>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        name: "FormReport",
        data(){
            return {
        
            }
        },

        props: {
            show: {
                type: Boolean,
                required: true

            }
        }
    }

</script>