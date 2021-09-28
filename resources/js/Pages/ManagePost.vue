<template>
<header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true"
                        class="mr-2" viewBox="0 0 24 24" focusable="false">
                        <path
                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" /></svg>
                    <strong>LaravelVue</strong>
                </a>
                <div>
                    <Link href="/home" type="button" class="btn btn-primary mx-1">Home</Link>
                    <Link method='post' href="/logout" as="button" type="button" class="btn btn-danger mx-1">Logout</Link>
                </div>
            </div>
        </div>
    </header>

    <main role="main">


        <div class="py-5 bg-light">

            <div class="container">
                <PostsForm class="mx-auto" :post="post[0]" :isCreate="false"></PostsForm>
            </div>

        </div>


    </main>
</template>

<script>
    import PostsForm from '../components/PostsForm.vue'
    import { Link, usePage } from '@inertiajs/inertia-vue3'
import { computed } from '@vue/reactivity'


    export default {
        components: {
            PostsForm,
            Link
        },
        setup() {
            const post = computed(() => usePage().props.value.post)

            return { post }
        },
    }
</script>

<style>

</style>
