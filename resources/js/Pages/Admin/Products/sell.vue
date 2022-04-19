<template>
  <Layout>
    <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Sell Product</h3>
          <p class="mt-1 text-sm text-gray-600">
            Carefully Complete All The Fields
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="submit">

            <!-- hidden input field for product id -->
            <input type="hidden" v-model="form.p_id" />


          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="p_name" class="block text-sm font-medium text-gray-700">Product name</label>
                  <input type="text" readonly :value="product.name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="brand" class="block text-sm font-medium text-gray-700">Product brand</label>
                  <input type="text" readonly :value="product.brand.name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="model" class="block text-sm font-medium text-gray-700">Product Model</label>
                  <input type="text" readonly :value="product.model" id="model" autocomplete="model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="model" class="block text-sm font-medium text-gray-700">Product Purchased From</label>
                  <input type="text" readonly :value="product.seller.name" id="model" autocomplete="model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="customer_id" class="block text-sm font-medium text-gray-700">Product Sold to</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.customer_id">{{ errors.customer_id }}</div>
                  <select id="customer_id" v-model="form.customer_id"  autocomplete="seller_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="customer in customers" :value="customer.id">{{ customer.name }}</option>
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="quantity" class="block text-sm font-medium text-gray-700">Product Quantity</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.soldquantity">{{ errors.sold_quantity }}</div>
                  <input type="number" v-model="form.sold_quantity" id="quantity" autocomplete="sold_quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="model" class="block text-sm font-medium text-gray-700">Unit Price</label>
                  <input type="text" readonly :value="product.price" id="model" autocomplete="model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="sold_at" class="block text-sm font-medium text-gray-700">Sold At</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.sold_at">{{ errors.sold_at }}</div>
                  <input type="number" v-model="form.sold_at" id="sold_at" autocomplete="sold_at" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="model" class="block text-sm font-medium text-gray-700">Total Price</label>
                  <span class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> {{ form.sold_quantity * form.sold_at }} </span>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="description" class="block text-sm font-medium text-gray-700">
                    Product Description
                  </label>
                  <div class="mt-1">
                    <textarea readonly id="description"  rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" :placeholder="product.description" />
                  </div>
                </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Sell
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
        product: Object,
        customers: Object,
    },

    data() {
      return { 
        form: this.$inertia.form({
            p_id: this.product.id,
            customer_id: this.product.customer_id,
            sold_quantity: this.product.sold_quantity,
            sold_at: this.product.sold_at,
        }),
        }
    },

    methods: {
      submit() {
        this.form.post('/sold-product')
      }
    },

    components: {
    Layout,
    },
  }
</script>
