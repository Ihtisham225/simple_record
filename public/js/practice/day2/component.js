//main container
const Brand = {
    data() {
      return {
        brands: [
            {name: 'HP'},
            {name: 'Apple'},
            {name: 'Dell'},
        ],
      }
    }
  }
  
  const main = Vue.createApp(Brand)
  
  main.component('brand-list', {
    props: ['brand'],
    template: `<tr>{{ brand.name }}</tr>`
  })
  
  main.mount('#container')


//navbar
const navbar = {
  data() {
    return {
      links: [
        {text: 'Home'},
        {text: 'Contact'},
        {text: 'About'},
      ],
      style: 'list-style: none; display:inline; margin: 20px; font-size: 20px;'
    }
  }
}

const nav = Vue.createApp(navbar)

nav.component('nav-links', {
  props: ['nav'],
  template: `<li><a href="#">{{ nav.text }}</a></li>`
})

nav.mount('#navbar')