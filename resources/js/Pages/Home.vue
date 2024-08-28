<script setup>
import PaginationLinks from "../Components/PaginationLinks.vue";

defineProps({
    users: Object
})

// format the dates
const getDate = (date) => new Date(date).toLocaleDateString("en-us", {
    year: "numeric",
    month: "long",
    day: "numeric"
});
</script>

<template>
    <Head title="Home | "/>

    <h1 class="text-2xl">Home page</h1>

    <div>
        <table>
            <thead>
            <tr class="bg-slate-300">
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="user in users.data" :key="user.id">
                <td>
                    <img v-if="user.avatar" :src="user.avatar" :alt="user.name" class="avatar">
                    <span v-else>N/A</span>
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ getDate(user.created_at) }}</td>
            </tr>
            </tbody>
        </table>

        <!-- Pagination Links-->
        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>
</template>
