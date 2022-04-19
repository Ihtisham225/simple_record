const MyCarsList = {
    data() {
        return {
            cars: [
                {
                    id: 1,
                    name: 'BMW'
                },
                {

                    id: 2,
                    name: 'Marcedes'
                },
                {
                    id: 3,
                    name: 'Lumburgini'
                },
                {
                    id: 4,
                    name: 'Ferari'
                },
                {
                    id: 5,
                    name: 'Toyota'
                },
            ],
            title: 'This is a title',
            favorite: ''
        }
    },
    methods: {
        favoriteCar(){
            if (this.favorite == 1 || this.favorite == 'bmw')
            {
                this.cars = [
                    {name: 'BMW'}
                ];
            }
            if (this.favorite == 2 || this.favorite == 'marcedes')
            {
                this.cars = [
                    {name: 'Marcedes'}
                ];
            }
            if (this.favorite == 3 || this.favorite == 'lumburgini')
            {
                this.cars = [
                    {name: 'Lumburgini'}
                ];
            }
            if (this.favorite == 4 || this.favorite == 'ferari')
            {
                this.cars = [
                    {name: 'Ferari'}
                ];
            }
            if (this.favorite == 5 || this.favorite == 'toyota')
            {
                this.cars = [
                    {name: 'Toyota'}
                ];
            }
        }
    }
}

const app = Vue.createApp(MyCarsList)

app.component('list-item', {
    props: ['car'],
    template: `<li>{{ car.name }} </li>`,
})

app.mount('#container')