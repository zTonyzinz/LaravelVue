<template>
    <component-to-re-render :key="componentKey" />
    <div>
        <form class="form-signin" @submit.prevent="submit()">
            <div class="text-center mb-4">
                <h1 class="h2 mb-3 py-3 font-weight-normal"><strong>LaravelVue Login</strong></h1>
            </div>

            <div class="form-label-group" >
                <input type="email" id="inputEmail" class="form-control" name="email" v-model="form.email"
                    placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group" >
                <input type="password" id="inputPassword" class="form-control" name="password" v-model="form.password"
                    placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="remember-me" v-model="form.remember"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
</template>

<script>
    import { Link, useForm, usePage } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    import { computed } from '@vue/reactivity'

    export default {
        components: {
            Link
        },
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    remember: false
                },
                componentKey: 0
            }
        },
        methods: {
            submit() {
                Inertia.post('/login', this.form)
            },
            forceRerender() {
                this.componentKey += 1
            }
        }

    }

</script>

<style scoped>

div#app{
    width: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input,
.form-label-group label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:-moz-placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:-ms-input-placeholder) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:-moz-placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

.form-label-group input:not(:-ms-input-placeholder) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

.form-label-group input:-webkit-autofill ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column-reverse;
    flex-direction: column-reverse;
  }

  .form-label-group label {
    position: static;
  }

  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>
