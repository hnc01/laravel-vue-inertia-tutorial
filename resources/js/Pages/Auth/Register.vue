<script setup>

import {useForm} from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
});

const submit = () => {
    form.post(route('register'));

    // if we want to clear the whole form (form.reset()) or
    // only some fields in case of error, we can do this
    // post("", {
    //      onError: () => form.reset('password', 'password_confirmation')
    // });
}

</script>

<template>
    <Head title="Register | "/>

    <h1 class="title">Register a new account</h1>

    <div class="w-1/2 mx-auto">
        <form @submit.prevent="submit">
            <TextInput label="Name" v-model="form.name" :error="form.errors.name"/>

            <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email"/>

            <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password"/>

            <TextInput label="Confirm password" type="password" v-model="form.password_confirmation"/>

            <div>
                <p class="text-slate-600 mb-2">Already a user?
                    <Link :href="route('login')" class="text-link">Login</Link>
                </p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template>
