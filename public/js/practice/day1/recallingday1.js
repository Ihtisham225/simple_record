const recalling = {
    data() {
        return {
            title: 'heading',
            heading: 'Recalling Day 1',
            name: 'Ihtisham',
            counter: 0,
        }
    },

    methods: {
        increment(){
            this.counter++;
        }
    }
}

Vue.createApp(recalling).mount('#main')