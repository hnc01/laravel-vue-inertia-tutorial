<script setup>

import {useForm} from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
});

const submit = () => {
    form.post(route('register.show'));

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
            <div class="mb-6">
                <label for="">Name</label>
                <input type="text" v-model="form.name">
                <small>{{ form.errors.name }}</small>
            </div>

            <div class="mb-6">
                <label for="">Email</label>
                <input type="email" v-model="form.email">
                <small>{{ form.errors.email }}</small>
            </div>

            <div class="mb-6">
                <label for="">Password</label>
                <input type="password" v-model="form.password">
                <small>{{ form.errors.password }}</small>
            </div>

            <div class="mb-6">
                <label for="">Confirm password</label>
                <input type="password" v-model="form.password_confirmation">
                <small>{{ form.errors.password_confirmation }}</small>
            </div>

            <div>
                <p class="text-slate-600 mb-2">Already a user?
                    <Link href="#" class="text-link">Login</Link>
                </p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template>
