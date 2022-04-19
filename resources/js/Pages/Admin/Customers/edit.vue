<template>
  <Layout>
    <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Customer</h3>
          <p class="mt-1 text-sm text-gray-600">
            Carefully Complete All The Fields
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="submit">

          <!-- hidden input field for product id -->
            <input type="hidden" v-model="form.c_id" />


          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="c_name" class="block text-sm font-medium text-gray-700">Customer name</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.c_name">{{ errors.c_name }}</div>
                  <input type="text" v-model="form.c_name" id="s_name" autocomplete="c_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="phone" class="block text-sm font-medium text-gray-700">Contact #</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.phone">{{ errors.phone }}</div>
                  <input type="text" v-model="form.phone" id="phone" autocomplete="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="address" class="block text-sm font-medium text-gray-700">Shop Address</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.address">{{ errors.address }}</div>
                  <input type="text" name="address" v-model="form.address" id="address" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="brand" class="block text-sm font-medium text-gray-700">Status</label>
                  <!-- start error Message -->
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.status">{{ errors.status }}</div>
                  <!-- end error Message -->
                  <select v-model="form.status" autocomplete="brand" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
              </button>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  </Layout>
</template>

<script>
  
  import Layout from '../AdminLayout'
  import { useForm } from '@inertiajs/inertia-vue3'

  export default {
    
    props: {
    errors: Object,
    customer: Object,
    },


    data() {
      return { 
        form: this.$inertia.form({
          c_id: this.customer.id,
          c_name: this.customer.name,
          phone: this.customer.phone,
          address: this.customer.address,
          status: this.customer.status,
        })
        }
    },

    methods: {
      submit() {
        this.form.post('/update-customer')
      }
    },
    
    components: {
    Layout,
    },
  }
</script>
