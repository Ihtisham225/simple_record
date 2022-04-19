
const twoWayBinding = {
    data() {
        return {
            message: 'Ihtisham'
        }
    },

    methods: {
        reverseMessage() {
            this.message = this.message.split('').reverse().join('')
        }
    }
}

Vue.createApp(twoWayBinding).mount('#two-way-binding')