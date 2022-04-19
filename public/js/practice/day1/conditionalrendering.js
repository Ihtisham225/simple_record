const conditionalRendering = {
    data() {
        return {
            message: 'Currently the condition is true, If we make the condition false then this sentence will not appear',
            seen: true,

            lists: [
                {text: 'This is first sentence'},
                {text: 'This is second sentence'},
                {text: 'This is third sentence'},
            ]
        }
    }
}

Vue.createApp(conditionalRendering).mount('#conditional-rendering')