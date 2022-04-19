<template>
    <section class="pt-20 pb-24 2xl:py-40 bg-gray-300">
        <div class="container mx-auto px-4">
            <div class="mb-16 md:mb-24 text-center">
            <h2 class="mb-8 md:mb-14 text-5xl lg:text-6xl 2xl:text-7xl text-black font-bold font-heading">Checkout</h2>
            <p class="text-lg text-black-200">Please Deposit Money to (03480152906) through easypaisa, then fill out the follwing fields.</p>
            </div>
            <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap items-center -mx-3">
                <div class="w-full lg:w-1/3 px-3 mb-8 lg:mb-0">
                
                </div>
                <div class="w-full lg:w-1/3 px-3 mb-8 lg:mb-0">
                <div class="px-12 py-16 bg-blue-500 rounded-3xl">
                    <div class="pb-8 mb-14 border-b border-blueGray-300">
                    <div class="flex justify-between items-center px-3">
                        <h3 class="text-4xl text-white font-bold font-heading">Total</h3>
                        <p class="text-lg text-white font-bold">Rs. 1099</p>
                    </div>
                    </div>
                    <form @submit.prevent="submit">
                    <ul class="text-lg text-white mb-16">
                    <li class="flex items-center mb-8">

                        <!-- Error message -->
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.name">{{ errors.name }}</div>

                        <div class="flex items-center pl-6 mb-3 bg-white rounded-full">
                        <span class="inline-block pr-3 text-gray-900 py-2 border-r border-gray-50">
                            <label>Name</label>
                        </span>
                        <input v-model="form.name" class="w-full pl-4 pr-6 py-4 font-bold text-gray-900 placeholder-gray-900 rounded-r-full focus:outline-none" type="text" placeholder="Enter Name">
                        </div>
                    </li>
                    <li class="flex items-center mb-8">

                        <!-- Error message -->
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.email">{{ errors.email }}</div>

                        <div class="flex items-center pl-6 mb-3 bg-white rounded-full">
                        <span class="inline-block pr-3 text-gray-900 py-2 border-r border-gray-50">
                            <label>Email</label>
                        </span>
                        <input v-model="form.email" class="w-full pl-4 pr-6 py-4 font-bold text-gray-900 placeholder-gray-900 rounded-r-full focus:outline-none" type="email" placeholder="Enter Email">
                        </div>
                    </li>
                    <li class="flex items-center mb-8">

                        <!-- Error message -->
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.phone">{{ errors.phone }}</div>

                        <div class="flex items-center pl-6 mb-3 bg-white rounded-full">
                        <span class="inline-block pr-3 text-gray-900 py-2 border-r border-gray-50">
                            <label>Phone</label>
                        </span>
                        <input v-model="form.phone" class="w-full pl-4 pr-6 py-4 font-bold text-gray-900 placeholder-gray-900 rounded-r-full focus:outline-none" type="text" placeholder="Enter Phone No.">
                        </div>
                    </li>
                    
                    <li class="flex items-center">
                        <span>We will Inform you with email and text message when we receive the payment. also we will send you
                            your credentials
                        </span>
                    </li>
                    </ul>
                    <div class="text-center"><button type="submit" class="inline-block px-10 py-4 border border-blueGray-300 hover:border-blueGray-100 rounded-full font-bold text-white">Subscribe</button></div>
                    </form>
                </div>
                </div>
                <div class="w-full lg:w-1/3 px-3">
                    
                </div>
            </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { useForm } from '@inertiajs/inertia-vue3'

    export default {
        data() {
        return { 
            form: this.$inertia.form({
            name: null,
            email: null,
            phone: null,
            })
            }
        },

        methods: {
        submit() {
            this.form.post('/new-user')
        }
        },
        
        props: {
        errors: Object,
        },
    }
</script>