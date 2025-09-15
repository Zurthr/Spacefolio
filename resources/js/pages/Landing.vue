<script setup lang="ts">
import Content from './Landing/Content/Content.vue';
import Hero from '../components/Landing/Hero.vue';
import Navbar from './Navbar.vue';
</script>

<template>
    <Navbar />
    <div style="gap: 60px; display: flex; flex-direction: column">
        <Hero />
        <Content />
    </div>
</template>

<style scoped></style>
