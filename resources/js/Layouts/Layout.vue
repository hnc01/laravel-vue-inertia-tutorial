<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>

                <div class="space-x-6">
                    <Link :href="route('register.show')" class="nav-link">Register</Link>
                    <Link :href="route('login.show')" class="nav-link">Login</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>
<script setup lang="ts">
</script>
