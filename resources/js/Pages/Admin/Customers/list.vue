<template>
    <Layout>
        <div class="pt-2 ml-3 mx-auto text-gray-600">
            <a href="/create-customer">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 py-2 px-4 rounded">
                Create New Customer 
            </button>
            </a>
            <button class="bg-transparent ml-3 py-2 px-4 border border-blue-500 rounded">
                Total Customers = {{ totalcustomers }} 
            </button>

            <!-- search -->
            <input class="border-2 border-gray-300 bg-white h-10 ml-3 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" v-model="searchQuery" placeholder="Search">
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Address
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="r of resultQuery" :key="r.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><a :href="'/customer-detail/'+r.id"> {{ r.name }} </a></div>
                            <!-- <div class="text-sm text-gray-500">{{ person.department }}</div> -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ r.phone }}</div>
                            <!-- <div class="text-sm text-gray-500">{{ person.department }}</div> -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ r.address }}</div>
                            <!-- <div class="text-sm text-gray-500">{{ person.department }}</div> -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ r.status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a :href="'edit-customer/'+r.id" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            </a>
                            <button @click.prevent="deleteCustomer(`${r.id}`)" class="text-indigo-600 hover:text-danger-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </Layout>

    <!-- This is alert box for deleting recored -->
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                        Delete Record
                    </DialogTitle>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                        Are you sure you want to delete this record? This record will be permanently removed. This action cannot be undone.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button @click.prevent="deleteItem(id)" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                    Delete
                </button>
                <button @click.prevent="cancelItem()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false" ref="cancelButtonRef">
                    Cancel
                </button>
                </div>
            </div>
            </TransitionChild>
        </div>
        </Dialog>
    </TransitionRoot>
    <Paginator :links="customers.links" />
</template>
<script>

import Layout from '../AdminLayout'
import Paginator from '../Partials/Pagination'
import { Inertia } from '@inertiajs/inertia'

//import components for delete confirmation overlay
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationIcon } from '@heroicons/vue/outline'

export default {

    data() {

        //open the delete confirmation overlay is set to false initially
        const open = ref(false)

        return {

            //set the overlay to open i.e false
            open,

            //id of the product which is selected for deletion
            id: null,

            //search a specific product
            searchQuery: null,
        }
    },

    props: {
        customers: Object,
        totalcustomers: Object,    
    },

    computed: {

        //logic of search query goes here
        resultQuery() {
        if (this.searchQuery) {
            return this.customers.data.filter(item => {
            return this.searchQuery
                .toLowerCase()
                .split(" ")
                .every(v => item.name.toLowerCase().includes(v));
            });
        } else {
            return this.customers.data;
            }
        }
    },


    components: {
        Layout,
        Paginator,

        //call delete confirmation components
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ExclamationIcon,
    },

    methods: {
        //this function call the delete confirmation overlay
        deleteCustomer(id){
            this.id = id;
            this.open = true;
        },

        //this function deletes the recored
        deleteItem(){
            Inertia.delete(`/delete-customer/${this.id}`);
            this.open = false;
        },

        //this function cancel the delete confirmation overlay
        cancelItem(){
            this.open = false;
        },
    }
}
</script>
<style>
    
</style>