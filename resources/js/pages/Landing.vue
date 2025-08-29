<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Hero from './Landing/Hero.vue';
import Content from './Landing/Content.vue';
import Navbar from './Navbar.vue';
</script>

<template>
 <Navbar />
 <div style="gap: 60px; display: flex; flex-direction: column;">
    <Hero />
    <Content />
</div>
</template>

<style scoped>
</style>