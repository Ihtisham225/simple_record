//Getters are methods which are used to get property in an object
//Setters are methods which are used to change property values in an object
//for example

const getAndSet =  Vue.createApp({
    data() {
        return {
            firstName: 'John',
            lastName: 'Smith',
        }
    },

    computed: {
        fullname: {
            get() {
                return this.firstName + ' ' + this.lastName;
            },
            set(value) {
                const names = value.split(' ');
                this.firstName = names[0];
                this.lastName = names[names.length - 1];
            }
        }
    }
}).mount('#getandset')
