<template>
    <aside id="default-sidebar" class="fixed top-0 left-0 z-1 w-32 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium text-base">
                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-slate-600">              
                        <button 
                            @click="report()"
                            class="ml-4"
                        >
                            Reportar
                        </button>

                    </span>
                
                </li>
                
                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-slate-600">              
                        <button 
                            @click="cards()"
                            class="ml-4"
                            
                        >
                            Cards
                        </button>

                    </span>
                
                </li>

                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-slate-600">              
                        <button 
                            @click="technicians"
                            class="ml-4"
                        >
                            Técnicos
                        </button>

                    </span>
                
                </li>

                <li>
                    <span class="flex p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-slate-600">              
                        <button 
                            @click="calls"
                            class="ml-4"
                        >
                            Ligações
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

    <CardsView
      v-if="this.showCard"
      :showCard="this.showCard"
      :user_id="this.user_id"
    />

    <div>
        <TecnicsView
        v-if="this.showTechnicians"
        :showTechnicians="this.showTechnicians"

        />
    </div>

    <CallView 
      v-if="showCalls"
      :showCalls="this.showCalls"
      :user_id="this.user_id"
    />
    
</template>

<script>
    import CallView from '@/views/components/CallView.vue';
    import CardsView from '@/views/components/CardsView.vue';
    import TecnicsView from '@/views/components/TecnicsView.vue';
    import FormReport from '@/views/forms/create/FormReport.vue';
    
    
    export default {
        data(){
            return {
                show: false,
                showCard: false,
                showTechnicians: false,
                showCalls: false   
            }
        },
        methods: {
            report() {
                this.show = !this.show
                // Mostrar o Forms para o card, vai deixar o all Cards e o técnicos no false
                this.showTechnicians = false
                this.showCalls = false
                this.showCard = false 
                
            },
            cards() {
                this.showCard = !this.showCard
                // Mostrar os Cards, vai deixar o Form do Card e o técnicos no false
                this.showTechnicians = false
                this.showCalls = false
                this.show = false
            },

            technicians(){
                this.showTechnicians = !this.showTechnicians
                // Mostrar os Cards, vai deixar o Form do Card e o técnicos no false
                this.showCard = false
                this.showCalls = false
                this.show = false
            },

            calls(){
                this.showCalls = !this.showCalls

                this.showTechnicians = false
                this.showCard = false
                this.show = false

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
            CardsView,
            TecnicsView,
            CallView

        },
    }

</script>