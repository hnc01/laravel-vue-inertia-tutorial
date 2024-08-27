<script setup>

import {useForm} from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null
});

const submit = () => {
    form.post(route('login.store'));

    // if we want to clear the whole form (form.reset()) or
    // only some fields in case of error, we can do this
    // post("", {
    //      onError: () => form.reset('password', 'password_confirmation')
    // });
}

</script>

<template>
    <Head title="Login | "/>

    <h1 class="title">Login to your account</h1>

    <div class="w-1/2 mx-auto">
        <form @submit.prevent="submit">
            <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email"/>

            <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password"/>

            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <input type="checkbox" v-model="form.remember" id="remember"/>
                    <label for="remember">Remember me</label>
                </div>

                <p class="text-slate-600">Don't have an account?
                    <Link :href="route('register.show')" class="text-link">Register</Link>
                </p>
            </div>

            <div>
                <button class="primary-btn" :disabled="form.processing">Login</button>
            </div>
        </form>
    </div>
</template>
