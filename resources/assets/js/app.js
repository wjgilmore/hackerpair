
require('./bootstrap')

window.Vue = require('vue')

import * as VueGoogleMaps from 'vue2-google-maps'

Vue.component('favorite', require('./components/Favorite.vue'))
Vue.component('ticket-box', require('./components/TicketBox.vue'))
Vue.component('google-cluster', VueGoogleMaps.Cluster)
Vue.component('gmap-infowindow', VueGoogleMaps.InfoWindow)

import Notifications from 'vue-notification'

Vue.use(Notifications)

Vue.component('example-component', require('./components/ExampleComponent.vue'))

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyB8ofh0XqenfwHdi8C_qbI4qLl0FqfZbuE',
        v: '3.29'
    }
})

var axios = require('axios')

Vue.prototype.$http = axios

const app = new Vue({
    el: '#app'
});
