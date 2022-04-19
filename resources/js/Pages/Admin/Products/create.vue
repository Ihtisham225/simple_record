<template>
  <Layout>
    <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Add New Product</h3>
          <p class="mt-1 text-sm text-gray-600">
            Carefully Complete All The Fields
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="submit">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="p_name" class="block text-sm font-medium text-gray-700">Product name</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.p_name">{{ errors.p_name }}</div>
                  <input type="text" name="p_name" v-model="form.p_name" id="p_name" autocomplete="p_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="brand" class="block text-sm font-medium text-gray-700">Product Brand</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.brand">{{ errors.brand }}</div>
                  <select id="brand" name="brand" v-model="form.brand_id" autocomplete="brand" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="model" class="block text-sm font-medium text-gray-700">Product Model</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.p_model">{{ errors.p_model }}</div>
                  <input type="text" name="model" v-model="form.p_model" id="model" autocomplete="model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="seller_id" class="block text-sm font-medium text-gray-700">Product Purchsed From</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.seller_id">{{ errors.seller_id }}</div>
                  <select id="seller_id" name="seller_id" v-model="form.seller_id"  autocomplete="seller_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="seller in sellers" :value="seller.id">{{ seller.name }}</option>
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.price">{{ errors.price }}</div>
                  <input type="number" name="price" v-model="form.price" id="price" autocomplete="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="quantity" class="block text-sm font-medium text-gray-700">Product Quantity</label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.quantity">{{ errors.quantity }}</div>
                  <input type="number" v-model="form.quantity" id="quantity" autocomplete="quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="description" class="block text-sm font-medium text-gray-700">
                    Product Description
                  </label>
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-if="errors.description">{{ errors.description }}</div>
                  <div class="mt-1">
                    <textarea id="description" name="description" v-model="form.description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Some Extra Information about this product" />
                  </div>
                  <p class="mt-2 text-sm text-gray-500">
                    Brief description about your product.
                  </p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label class="block text-sm font-medium text-gray-700">
                    Product photo
                  </label>
                  <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                      <div class="flex text-sm text-gray-600">
                        <label for="p-image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                          <!-- <span>Upload a file</span> -->
                          <input id="p_image" name="p_image" type="file" @input="form.p_image = $event.target.files[0]"  />
                        </label>
                      </div>
                      <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
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
    data() {
      return { 
        form: this.$inertia.form({
          p_name: null,
          brand_id: null,
          p_model: null,
          seller_id: null,
          price: null,
          quantity: null,
          p_image: null,
          description: null
        })
        }
    },

    methods: {
      submit() {
        this.form.post('/save-product')
      }
    },
    
    props: {
    errors: Object,
    brands: Object,
    sellers: Object,
    },

    components: {
    Layout,
    },
  }
</script>
