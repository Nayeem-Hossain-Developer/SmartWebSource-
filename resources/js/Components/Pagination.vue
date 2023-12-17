<template>
    <div v-if="links.length > 3">
        <div class="d-flex flex-wrap mt-8">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="underline-none mr-1 mb-1 px-3 py-2 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label"
                />

                <Link
                    v-else
                    class="underline-none mr-1 mb-1 px-3 py-2 text-sm leading-4 border rounded hover:bg-white focus:border-primary focus:text-primary"
                    :class="{ 'bg-primary text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link,Head } from '@inertiajs/vue3'
export default defineComponent({
    components: {
        Link,
    },
    props: {
        links: Array,
    },
});
</script>

<style scopeed>
  .underline-none{
    text-decoration: none;
  }
</style>
