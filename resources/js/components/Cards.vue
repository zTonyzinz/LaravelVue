<template>
    <div class="col mb-4">
        <div class="card" id="{{ postId }}">
            <img :src="image" class="card-img-top" :alt="image">
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ description }}</p>
            </div>
            <div class="card-footer" v-if="buttonManage">
                <Link :href="`/managePost/${postId}`" class="btn btn-primary">Manage</Link>
            </div>
            <div class="card-footer" v-else>
                <small class="text-muted">{{ hour }}</small>
            </div>
        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        props: {
            postId: Number,
            image: String,
            title: String,
            description: String,
            hour: String,
            buttonManage: Boolean
        },
        components: {
            Link
        }
    }

</script>

<style>

</style>
