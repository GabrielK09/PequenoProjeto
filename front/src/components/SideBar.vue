<template>
    <aside id="default-sidebar" class="fixed top-0 left-0 z-1 w-32 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium text-base">
                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">              
                        <button 
                            @click="report()"
                            class="ml-4"
                        >
                            Reportar
                        </button>

                    </span>
                
                </li>
                
                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">              
                        <button 
                            @click=""
                            class="ml-4"
                        >
                            Cards
                        </button>

                    </span>
                
                </li>

                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">              
                        <button 
                            @click=""
                            class="ml-4"
                        >
                            Técnicos
                        </button>

                    </span>
                
                </li>
            </ul>
        </div>
    </aside>

    <FormReport
      v-if="this.show"
      :show="this.show"
      :user_id="this.user_id"
    />
    
</template>

<script>
    import FormReport from '@/views/forms/FormReport.vue';

    export default {
        data(){
            return {
                show: true,
            }
        },
        methods: {
            report() {
                this.show = !this.show

            }
        },

        props: {
            user_id: {
                type: String,
                required: true
            }
        },

        components: {
            FormReport,

        },  
       
    }

</script>