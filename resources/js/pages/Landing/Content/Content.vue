<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import KeyContent from './KeyContent.vue';
import ListOfContent from './ListOfContent.vue';
import OtherProjectsGrid from './OtherProjectsGrid.vue';

const titleContainer = ref(null);
const paddingTop = ref(24);

const otherProjects = ref([
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Task Management App",
        description: "Collaborative task management application with real-time updates, team collaboration features, and intuitive user interface."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "E-commerce Platform",
        description: "Modern e-commerce solution with advanced product catalog, secure payment processing, and comprehensive admin dashboard."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Social Media Dashboard",
        description: "Comprehensive social media management tool with analytics, scheduling, and multi-platform integration."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Weather App",
        description: "Beautiful weather application with real-time data, forecasts, and location-based services."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Portfolio Website",
        description: "Responsive portfolio website showcasing creative work with smooth animations and modern design."
    }
]);

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
                <div class="key-content">
                    <KeyContent
                        media="/Assets/Videos/BIMain.mp4"
                        title="Portal Data External Bank Indonesia"
                        description="Central Bank of Indonesia's portal data site for external users to access monetary data."
                    />

                    <KeyContent
                        media="/Assets/Videos/ArchipelMain.mp4"
                        title="Archipel Map"
                        description="A modern, responsive portfolio website built with Laravel, Vue.js, and TypeScript. Features smooth animations, dynamic content, and a sleek design inspired by space aesthetics."
                    />

                    <KeyContent
                        media="/Assets/Images/Content/Task Management.png"
                        title="Task Management App"
                        description="Collaborative task management application with real-time updates, team collaboration features, and intuitive user interface."
                    />
                </div>
                <OtherProjectsGrid :projects="otherProjects" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.title-container {
    display: flex;
    z-index: 100;
    position: sticky;
    top: 0px;
    flex-direction: row;
    gap: auto;
    width: 100%;
    padding: v-bind(paddingTop + 'px') 16px 8px 16px;
    background: linear-gradient(357deg, rgba(55, 59, 62, 0) 2.41%, #2D3136 54.12%), rgba(57, 60, 63, 0.2);
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
    padding: 30px 72px 30px 72px;
    gap: 30px;
    flex-shrink: 0;
    width: 100vw;
    max-width: calc(1440px + 144px);
    align-self: center;
    background-image: url('/Assets/Images/Background/BackgroundContent.png');
    background-size: cover;
    background-position: bottom;
    background-repeat: no-repeat;
    background-attachment: fixed;
    justify-self: center;
}

.content-items {
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100%;
    z-index: 1;
}

.key-content {
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100%;
    z-index: 1;
}

@media (max-width: 768px) {
    .content-items {
        gap: 16px;
    }
}
</style>
