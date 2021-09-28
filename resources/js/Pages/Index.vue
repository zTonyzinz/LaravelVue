<template>
    <div>
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
                    <div v-if="user">
                        <Link href="/home" type="button" class="btn btn-primary mx-1">Home</Link>
                        <Link method='post' href="/logout" as="button" type="button" class="btn btn-danger mx-1">Logout</Link>
                    </div>
                    <div v-else>
                        <Link href="/login" type="button" class="btn btn-primary">Login</Link>
                    </div>
                </div>
            </div>
        </header>

        <main role="main">

            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row row-cols-1 row-cols-md-3">

                        <Cards v-for="post in posts" :key="post.id" :postId="post.id" :image="post.image" :title="post.title" :description="post.description" :hour="post.created_at" :buttonManage="false"></Cards>

                    </div>
                </div>
            </div>

        </main>
    </div>


</template>

<script>
    import { Link, usePage } from '@inertiajs/inertia-vue3'
    import Cards from '../components/Cards.vue'
    import { computed } from '@vue/reactivity'

    export default {
        components: {
            Cards,
            Link
        },
        setup() {
            const user = computed(() => usePage().props.value.auth.user)
            const posts = computed(() => usePage().props.value.posts)

            return { user, posts }
        },
    }

</script>

<style scoped>
body,html{
    height: 100%;
    background-color: #f8f9fa !important;
}

div#app{
    height: 100%;
}
</style>
