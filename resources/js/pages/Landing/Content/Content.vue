<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import KeyContent from './KeyContent.vue';
import ListOfContent from './ListOfContent.vue';

const titleContainer = ref(null);
const paddingTop = ref(24);

const handleScroll = () => {
    if (!titleContainer.value) return;

    const rect = titleContainer.value.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    const threshold = windowHeight * 0.096;
    const elementTop = rect.top;

    console.log('Element top:', elementTop, 'Threshold (20% from top):', threshold, 'Window height:', windowHeight);

    if (elementTop <= threshold) {
        const maxDistance = threshold;
        const currentDistance = Math.max(0, elementTop);
        let progress = Math.max(0, Math.min(1, (threshold - currentDistance) / maxDistance));

        progress = 1 - Math.pow(1 - progress, 3);

        paddingTop.value = 24 + 76 * progress;
    } else {
        console.log('Element below threshold, setting padding to 24px');
        paddingTop.value = 24;
    }
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="content-section">
        <ListOfContent />
        <div>
            <div class="title-container" ref="titleContainer">
                <div class="content-title">
                    <h2>A highlight of my proudest</h2>
                    <h1>CREATIONS</h1>
                </div>
                <div class="content-description">
                    <h3>Peer into my beloved craft</h3>
                    <h4>A product of ever-burning coffee addiction and Ylang Ylang tea.</h4>
                </div>
            </div>
            <div class="content-items">
                <KeyContent
                    :isHighlight="true"
                    img="/Assets/Images/Content/Spacefolio.png"
                    title="Spacefolio Portfolio"
                    description="A modern, responsive portfolio website built with Laravel, Vue.js, and TypeScript. Features smooth animations, dynamic content, and a sleek design inspired by space aesthetics."
                >
                </KeyContent>

                <KeyContent
                    :isProject="true"
                    img="/Assets/Images/Content/E-Commerce.png"
                    title="E-Commerce Platform"
                    description="Full-stack e-commerce solution with user authentication, payment processing, and admin dashboard. Built with modern web technologies for optimal performance."
                />

                <KeyContent
                    :isProject="true"
                    img="/Assets/Images/Content/Task Management.png"
                    title="Task Management App"
                    description="Collaborative task management application with real-time updates, team collaboration features, and intuitive user interface."
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.title-container {
    display: flex;
    position: sticky;
    top: 0px;
    flex-direction: row;
    gap: auto;
    width: 100%;
    padding: v-bind(paddingTop + 'px') 16px 8px 16px;
    background: linear-gradient(357deg, rgba(55, 59, 62, 0) 2.41%, #393c3f 54.12%), rgba(57, 60, 63, 0.2);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    margin-bottom: 24px;
}

.content-title {
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: -4px;
}

.content-description {
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: 4px;
    text-align: right;
}

.content-section {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    padding: 30px 92px 30px 92px;
    gap: 30px;
    flex-shrink: 0;
    width: 100vw;
    max-width: calc(1440px + 184px);
    align-self: center;
    justify-self: center;
}

.content-items {
    display: flex;
    flex-direction: column;
    gap: 24px;
    width: 100%;
    z-index: -1;
}

@media (max-width: 768px) {
    .content-items {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}
</style>
