<template>
   <div class="container">
        <div class="row">
           <div class="col-md-10 mx-auto mt-3">
                <div class="mb-3">
                    <input
                            type="text"
                            v-model="name"
                            @keyup="applyFilters"
                            placeholder="Search Country..."
                            class=""
                        />
                </div>
                 <div class="card card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">City Name</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Country Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="city in cities.data" :key="city.id">
                                <td scope="row">{{city.id}}</td>
                                <td>{{city.city}}</td>
                                <td>{{city.state_name}}</td>
                                <td>{{city.county_name}}</td>
                            </tr>
                        </tbody>
                 </table>
                 <pagination class="mt-6" :links="cities.links" />
                 </div>
           </div>
        </div>
    </div>


</template>

<script>
import Pagination from '../Components/Pagination.vue'
import { Link,Head,router } from '@inertiajs/vue3'
import {ref} from 'vue'


export default {
  components: {
    Pagination,
    Link
  },
  setup () {
    let name = ref('');
  },
  props: {
    cities: Object,
  },
 methods: {
        applyFilters() {
            router.get('/', { name: this.name })
            .then(response => {
               this.cities = response.data;
            })
            .catch(error => {
               console.error(error);
            });
        },
    },

}

</script>
