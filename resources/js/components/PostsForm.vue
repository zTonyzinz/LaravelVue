<template>
    <form enctype="multipart/form-data">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="image" @input="form.image = $event.target.files[0]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName1">Name Post</label>
            <input type="text" class="form-control" id="inputName1" v-model="form.title" required>
        </div>
        <div class="form-group">
            <label for="textArea1">Description</label>
            <textarea class="form-control" style="resize: none;" id="textArea1"  v-model="form.description" required></textarea>
        </div>
        <div v-if="isCreate">
            <Link href="/createPost" :data="{ id: post.id, image: form.image, title: form.title, description: form.description }" method="post" as="button" type="button" enctype="multipart/form-data" class="btn btn-primary">Create</Link>
        </div>
        <div v-else>
            <Link :href="`/managePost/${post.id}`" :data="{ id: post.id, image: form.image, title: form.title, description: form.description }" method="patch" as="button" type="button" enctype="multipart/form-data" class="btn mx-1 btn-primary">Manage</Link>
            <Link data-toggle="modal" :href="`/managePost/${post.id}`" method="delete" as="button" type="button" class="btn mx-1 btn-danger">Delete</Link>
        </div>
    </form>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    import axios from 'axios'

    export default {
        props: {
            isCreate: Boolean,
            post: Array
        },
        components: {
            Link
        },
        data() {
            return {
                form: {
                    image: this.post.image,
                    title: this.post.title,
                    description: this.post.description
                }
            }
        },
        methods: {
            submit(location) {
                Inertia.post(location, this.form)

            },
             deleteData: function(result, id) {
                axios.delete(result.id + "/destroy")
                .then(response => {
                    this.result.splice(id, 1)
                    console.log(this.result);
                    this.redirect('home')
                });
            },
        },

    }

</script>

<style>

</style>
