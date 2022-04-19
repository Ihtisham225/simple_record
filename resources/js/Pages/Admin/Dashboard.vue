<template>
    <Layout>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <h1 class="text-3xl font-bold text-gray-900">
                                Dashboard
                            </h1>
                            </div>
                        </header>
                        <main>
                            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                            <!-- Replace with your content -->
                            <section class="py-8 bg-blueGray-50 overflow-hidden">
                            <div class="container px-4 mx-auto">
                                <div class="flex flex-wrap -mx-4 xl:-mx-7">
                                <div class="w-full md:w-1/2 xl:w-1/4 px-4 xl:px-7 mb-8 xl:mb-0">
                                    <div class="h-full pt-10 px-5 pb-6 text-center bg-gray-100 rounded-3xl">
                                    <h3 class="mb-6 text-sm text-darkBlueGray-300 font-heading font-medium">Engaged Customers</h3>
                                    <div class="flex items-center justify-center mb-6">
                                        <span class="inline-block mr-2 text-6xl font-heading font-medium">448</span>
                                        <div class="px-3 text-center bg-green-200 bg-opacity-70 rounded-full">
                                        <span class="text-xxs font-bold text-green-500 leading-7">+9%</span>
                                        </div>
                                    </div>
                                    <div class="chart" data-type="area-small-blue"></div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/4 px-4 xl:px-7 mb-8 xl:mb-0">
                                    <div class="h-full pt-10 px-5 pb-6 text-center bg-gray-100 rounded-3xl">
                                    <h3 class="mb-6 text-sm text-darkBlueGray-300 font-heading font-medium">Total Profit</h3>
                                    <div class="flex items-center justify-center mb-6">
                                        <span class="inline-block mr-2 text-6xl font-heading font-medium">$3,640</span>
                                        <div class="px-3 text-center bg-green-200 bg-opacity-70 rounded-full">
                                        <span class="text-xxs font-bold text-green-500 leading-7">+5%</span>
                                        </div>
                                    </div>
                                    <div class="chart" data-type="area-small-indigo"></div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/4 px-4 xl:px-7 mb-8 md:mb-0">
                                    <div class="h-full pt-10 px-5 pb-6 text-center bg-gray-100 rounded-3xl">
                                    <h3 class="mb-6 text-sm text-darkBlueGray-300 font-heading font-medium">Total Brands</h3>
                                    <div class="flex items-center justify-center mb-6">
                                        <span class="inline-block mr-2 text-6xl font-heading font-medium">9</span>
                                        <div class="px-3 text-center bg-red-200 bg-opacity-70 rounded-full">
                                        <span class="text-xxs font-bold text-red-500 leading-7">+2%</span>
                                        </div>
                                    </div>
                                    <div class="chart" data-type="area-small-orange"></div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/4 px-4 xl:px-7">
                                    <div class="h-full pt-10 px-5 pb-6 text-center bg-gray-100 rounded-3xl">
                                    <h3 class="mb-6 text-sm text-darkBlueGray-300 font-heading font-medium">Total Sellers</h3>
                                    <div class="flex items-center justify-center mb-6">
                                        <span class="inline-block mr-2 text-6xl font-heading font-medium">29</span>
                                        <div class="px-3 text-center bg-green-200 bg-opacity-70 rounded-full">
                                        <span class="text-xxs font-bold text-green-500 leading-7">+9%</span>
                                        </div>
                                    </div>
                                    <div class="chart" data-type="area-small-green"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>
                            <!-- /End replace -->
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>

import Layout from './AdminLayout'
import { Inertia } from '@inertiajs/inertia'

//import components for delete confirmation overlay
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationIcon } from '@heroicons/vue/outline'

export default {

    props: {

        //products array passed from the controller
        totalbudget: Object,
        totalproducts: Object,
        totalbrands: Object,
        totalcustomers: Object,
        totalsellers: Object,
    },
    components: {
        Layout,
    },
}
</script>
<style>
    
</style>