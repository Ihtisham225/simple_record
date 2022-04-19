
const eventHandling = {
    data() {
        return {
            message: 'ihtisham',
            counter: 0
        }
    },

    methods: {
        reverseMessage() {
            this.message = this.message.split('').reverse().join('')
        },

        increment() {
            this.counter++
        },

        decrement() {
            this.counter--
        }
    }
}

Vue.createApp(eventHandling).mount('#event-handling')