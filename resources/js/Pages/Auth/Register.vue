<script setup>

import {ref} from "vue";

const form = ref({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
})

const submit = () => {
    console.log(form);
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
            </div>

            <div class="mb-6">
                <label for="">Email</label>
                <input type="email" v-model="form.email">
            </div>

            <div class="mb-6">
                <label for="">Password</label>
                <input type="password" v-model="form.password">
            </div>

            <div class="mb-6">
                <label for="">Confirm password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>

            <div>
                <p class="text-slate-600 mb-2">Already a user?
                    <Link href="#" class="text-link">Login</Link>
                </p>
                <button class="primary-btn">Register</button>
            </div>
        </form>
    </div>
</template>
