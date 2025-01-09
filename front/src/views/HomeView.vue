<template>
  <h1>
    Digite seu CEP
  </h1>

  <input
    type="text"
    v-model="cep"
  />

</template>

<script>
/* eslint-disable */
import { axios } from 'axios';

export default {
  name: 'HomeView',
  data() {
    return {
      cep: null,
    };
  },
  methods: {
    async getData() {
      const response = await axios.get(`viacep.com.br/ws/${this.cep}/json/`);
      console.log(response)
    },
  },
};
</script>
