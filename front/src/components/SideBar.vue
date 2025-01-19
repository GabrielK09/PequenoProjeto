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
<<<<<<< HEAD
                            @click="cards()"
=======
                            @click=""
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071
                            class="ml-4"
                        >
                            Cards
                        </button>

                    </span>
                
                </li>

                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">              
                        <button 
<<<<<<< HEAD
                            @click="technicians"
=======
                            @click=""
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071
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
<<<<<<< HEAD

    <CardsView
      v-if="this.showCard"
      :showCard="this.showCard"
    />

    <TecnicsView
      v-if="this.showTechnicians"
      :showTechnicians="this.showTechnicians"

    />
=======
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071
    
</template>

<script>
<<<<<<< HEAD
    import CardsView from '@/views/components/CardsView.vue';
    import TecnicsView from '@/views/components/TecnicsView.vue';
    import FormReport from '@/views/forms/create/FormReport.vue';
    
    export default {
        data(){
            return {
                show: false,
                showCard: false,
                showTechnicians: false
=======
    import FormReport from '@/views/forms/FormReport.vue';

    export default {
        data(){
            return {
                show: true,
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071
            }
        },
        methods: {
            report() {
                this.show = !this.show
<<<<<<< HEAD
                // Mostrar o Forms para o card, vai deixar o all Cards e o técnicos no false
                this.showCard = false 
                this.showTechnicians = false

            },
            cards() {
                this.showCard = !this.showCard
                // Mostrar os Cards, vai deixar o Form do Card e o técnicos no false
                this.show = false
                this.showTechnicians = false
            },

            technicians(){
                this.showTechnicians = !this.showTechnicians
                // Mostrar os Cards, vai deixar o Form do Card e o técnicos no false
                this.showCard = false
                this.show = false
            }

=======

            }
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071
        },

        props: {
            user_id: {
                type: String,
                required: true
            }
        },

        components: {
            FormReport,
<<<<<<< HEAD
            CardsView,
            TecnicsView
=======
>>>>>>> 1a602c4c0be07e367605139a12bdf137e009d071

        },  
       
    }

</script>