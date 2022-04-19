
const DoingItAllAgain = {
    data(){
        return {
            heading: 'Practice',
            message: 'Practicing What I have learnt in day 1',
            name: 'Ihtisham',
            title: 'this is title of heading',
            counter: 0,
            timer: 0,
            seen: true,
            users: [
                {
                    id: 1,
                    name: 'Ihtisham ul haq'},
                {
                    id: 2,
                    name: 'Jawad Khan'},
                {
                    id: 3,
                    name: 'Hazrat Ali'},
                {
                    id: 4,
                    name: 'Irshad Ali'},
                {
                    id: 5,
                    name: 'Amir Hamza'},
            ]
        }
    },

    mounted(){
        setInterval(() =>{
            this.timer++
        }, 1000)
    },

    methods: {
        reverseName(){
            this.name = this.name.split('').reverse().join('');
        },
        increment(){
            this.counter++;
        },
        decrement(){
            if(this.counter > 0){
                this.counter--;
            }
        },
        reset(){
            this.counter = 0;
        }
    }
}

Vue.createApp(DoingItAllAgain).mount('#main');


const Calculator = {
    data() {
        return {
             a1: 0,
             a2: 0,

             m1: 0,
             m2: 0,

             s1: 0,
             s2: 0,

             d1: 0,
             d2: 0,
        }
    },
}

Vue.createApp(Calculator).mount('#calculator')