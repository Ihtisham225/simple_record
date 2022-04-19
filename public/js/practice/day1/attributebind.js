const AttributeBind = {
    data() {
        return {
            message: 'You loaded this page on ' + new Date().toLocaleString()
        }
    }
}

Vue.createApp(AttributeBind).mount('#attribute-bind')