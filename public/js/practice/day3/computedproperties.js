Vue.createApp({
    data() {
        return {
            author: {
                name: 'John',
                books: [
                    'Book1',
                    'Book2',
                    'Book3'
                ]
            }
        }
    },
    computed: {
        publishedBookAuthor(){
            return this.author.books.length > 0 ? 'Yes' : 'No'
        }
    }
}).mount('#computed')