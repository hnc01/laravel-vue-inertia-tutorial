<script setup>
// we can't pass the form as a prop so we need
// to use defineModel
const model = defineModel({
    type: null,
    required: true
});

// defining props for component
defineProps({
    label: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    error: String
})
</script>

<template>
    <div class="mb-6">
        <label for="">{{ label }}</label>
        <input :type="type" v-model="model" :class="{'!ring-red-500' : error}">
        <small class="error" v-if="error">{{ error }}</small>
    </div>
</template>
