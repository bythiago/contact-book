<template>
  <div class="q-pa-md">

    <div class="row">
      <div class="col">
        <div class="q-pa-md">
            <q-form
            @submit="onSubmit"
            @reset="onReset"
            class="q-gutter-md"
            >
            <q-input
                filled
                v-model="name"
                label="Your name *"
                hint="Name and surname"
                lazy-rules
                :rules="[ val => val && val.length > 0 || 'Please type something']"
            />
            <q-input
                filled
                v-model="email"
                label="Your email *"
                hint="Name and surname"
                lazy-rules
                :rules="[ val => val && val.length > 0 || 'Please type something']"
            />
            <q-input
                filled
                v-model="phone"
                label="Your phone *"
                lazy-rules
                :rules="[
                val => val !== null && val !== '' || 'Please type your phone'
                ]"
            />

            <q-toggle v-model="accept" label="I accept the license and terms" />

            <div>
                <notifications group="foo" />
                <q-btn label="Submit" type="submit" color="primary"/>
                <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
            </div>
            </q-form>

        </div>
      </div>
    </div>
  </div>
</template>

<script>

const axios = require('axios')
import Vue from 'vue'
import Notifications from 'vue-notification'

export default {
  name: 'PageIndex',
  data () {
    return {
      name: null,
      email: null,
      phone: null,
      accept: false,
      data: null
    }
  },
  methods: {
    onSubmit () {
      if (this.accept === true) {
        axios.post('http://192.168.1.10:8000/contacts', {
          name: this.name,
          email: this.email,
          phone: this.phone
        }).then(function (response) {
          Vue.notify({
            group: 'foo',
            title: 'Important message',
            icon: 'warning',
            text: 'Hello user! This is a notification!',
            type: 'success'
          })
          setInterval(function () {
            window.location.href = '/#/contatos'
          }, 1000)
        }).catch(function (error) {
          Vue.notify({
            group: 'foo',
            title: 'Important message',
            icon: 'warning',
            text: JSON.stringify(error),
            type: 'error'
          })
        })
      }
    },
    onReset () {
      this.name = null
      this.email = null
      this.phone = null
      this.accept = false
    }
  },
  beforeMount () {
    console.log('https://br.vuejs.org/v2/guide/instance.html')
    Vue.use(Notifications)
  },
  mounted () {
  }
}
</script>
