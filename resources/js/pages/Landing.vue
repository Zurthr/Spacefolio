<script setup lang="ts">
import Content from './Landing/Content/Content.vue';
import Navbar from './Navbar.vue';

// Define props for portfolio data
interface PortfolioItem {
    id: number;
    title: string;
    description: string;
    media: string;
    type: 'key' | 'other';
    order: number;
    is_active: boolean;
}

interface Props {
    keyCreations?: PortfolioItem[];
    otherProjects?: PortfolioItem[];
    debug?: any;
}

const props = withDefaults(defineProps<Props>(), {
    keyCreations: () => [],
    otherProjects: () => [],
    debug: () => null
});
</script>

<template>
    <Navbar />
    <div style="gap: 60px; display: flex; flex-direction: column">
        <Content 
            :keyCreations="props.keyCreations"
            :otherProjects="props.otherProjects"
        />
    </div>
</template>

<style scoped></style>
