<template>
  <div class="q-pa-md">

    <div class="row">
      <div class="col">
        <div class="q-pa-md">
          <q-table
            title="Contatos"
            :data="data"
            :columns="columns"
            row-key="id"
          ></q-table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

const axios = require('axios')

export default {
  name: 'PageContacts',
  data () {
    return {
      columns: [
        {
          name: 'id',
          align: 'left',
          label: '@',
          field: 'id',
          sortable: true
        },
        {
          name: 'name',
          required: true,
          label: 'Nome',
          align: 'left',
          field: row => row.name,
          format: val => `${val}`,
          sortable: true
        },
        {
          name: 'email',
          align: 'left',
          label: 'E-mail',
          field: 'email',
          sortable: true
        },
        {
          name: 'phone',
          align: 'left',
          label: 'Telefone',
          field: 'phone',
          sortable: true
        }
      ],
      data: []
    }
  },
  methods: {
  },
  beforeMount () {
    console.log('https://br.vuejs.org/v2/guide/instance.html')
  },
  mounted () {
    axios.get('http://192.168.1.10:8000/contacts').then(response => (this.data = response.data))
  }
}
</script>
