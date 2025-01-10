<template>
  <h1>
    Digite seu CEP
  </h1>

  <form @submit.prevent="getData()">
    <input
      type="text"
      v-model="cep"
      maxlength="8"
    />

    <br>
    <button
      type="submit"
    >
      Buscar
    </button>

  </form>

  <div v-if="dataResponse != ''">
    <h3>CEP: {{dataResponse.cep}}</h3>
    <h3>Logradouro: {{dataResponse.logradouro}}</h3>
    <h3>Bairro: {{dataResponse.bairro}}</h3>
    <h3>Cidade: {{dataResponse.localidade}}</h3>
    <h3>UF: {{dataResponse.uf}}</h3>
    <h3>Estado: {{dataResponse.estado}}</h3>
    <h3>Código IBGE: {{dataResponse.ibge}}</h3>
  </div>
</template>

<script>
/* eslint-disable */
import axios from 'axios';

export default {
  name: 'HomeView',
  data() {
    return {
      cep: '',
      dataResponse: []
    };
  },
  methods: {
    async getData() {
      try {
        const response = await axios.get(`https://viacep.com.br/ws/${this.cep}/json`);
        this.dataResponse = response.data
        console.log(this.dataResponse)
        
      } catch (error) {
        console.error(error)  

      }
      
    },
  },
};
</script>
