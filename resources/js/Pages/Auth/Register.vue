<script setup>

import {useForm} from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null
});

const submit = () => {
    form.post(route('register'));

    // if we want to clear the whole form (form.reset()) or
    // only some fields in case of error, we can do this
    // post("", {
    //      onError: () => form.reset('password', 'password_confirmation')
    // });
}

const change = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
}

</script>

<template>
    <Head title="Register | "/>

    <h1 class="title">Register a new account</h1>

    <div class="w-1/2 mx-auto">
        <form @submit.prevent="submit">
            <!-- Upload Avatar -->
            <div class="grid place-items-center">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input type="file" @input="change" id="avatar" hidden/>

                    <img class="object-cover w-28 h-28" v-if="form.preview" :src="form.preview" alt="avatar preview"/>
                </div>

                <p class="error mt-2">{{ form.errors.avatar }}</p>
            </div>
            <!-- End Upload Avatar -->

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
