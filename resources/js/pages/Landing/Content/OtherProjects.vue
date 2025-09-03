<template>
    <div 
        ref="keyContentRef" 
        :class="['projects', { interactive: isInteractive }]"
        :style="rootStyle"
    >
        <video 
            v-if="isVideo"
            class="projects__video"
            :src="props.media"
            autoplay
            loop
            muted
            playsinline
        ></video>
        
        <div class="projects__header">
            <h3 class="projects__title">{{ title }}</h3>
        </div>

        <p class="projects__description">{{ description }}</p>
        <p class="button-content"><img src="/Assets/Icons/Binoculars.svg">Peer deeper..</p>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue';

interface Props {
    title: string;
    description: string;
    media: string;
    index?: number;
}

const props = withDefaults(defineProps<Props>(), {
    media: '',
    index: 0,
});
const isVideo = computed(() => {
    const videoExtensions = ['.mp4', '.webm', '.ogg', '.mov', '.avi', '.mkv'];
    return videoExtensions.some(ext => props.media.toLowerCase().endsWith(ext));
});

// Refs and reactive state for scroll-based animation
const keyContentRef = ref<HTMLElement | null>(null);
const opacity = ref(0);
let rafId: number | null = null;

function clamp(value: number, min = 0, max = 1) {
    return Math.max(min, Math.min(max, value));
}

function updateVisibility() {
    const el = keyContentRef.value;
    if (!el) return;
    const rect = el.getBoundingClientRect();
    const topRatio = rect.top / (window.innerHeight || document.documentElement.clientHeight || 1);
    // Map topRatio from [0.95 -> 0.8] to [0 -> 1]
    const mapped = (0.95 - topRatio) / (0.97 - 0.75);
    opacity.value = clamp(mapped);
    rafId = null;
}

function scheduleUpdate() {
    if (rafId != null) return;
    rafId = requestAnimationFrame(updateVisibility);
}

onMounted(() => {
    // initial
    updateVisibility();
    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);
});

onUnmounted(() => {
    window.removeEventListener('scroll', scheduleUpdate);
    window.removeEventListener('resize', scheduleUpdate);
    if (rafId != null) cancelAnimationFrame(rafId);
});

const isOdd = computed(() => ((props.index ?? 0) % 2) === 1);

const translateX = computed(() => {
    const offset = (1 - opacity.value) * 40; // px
    return isOdd.value ? `translateX(${-offset}px)` : `translateX(${offset}px)`;
});

const rootStyle = computed(() => ({
    '--bg-image': isVideo.value ? 'none' : `url(${props.media})`,
    transform: translateX.value,
    opacity: `${opacity.value}`,
}));

const isInteractive = computed(() => opacity.value >= 0.99);
</script>

<style scoped>
.projects {
    display: flex;
    flex-direction: column;
    background-image: var(--bg-image);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    gap: 8px;
    padding: 24px;
    border-radius: 12px;
    background-color: var(--color-dark-gray-i, #27292a);
    transition: all 0.3s ease, transform 0.7s ease;
    cursor: pointer;
    justify-self: center;
    align-self: center;
    width: 96%;
    transform-origin: center;
    justify-content: flex-end;
    position: relative;
    overflow: hidden;
}

.projects:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(57, 60, 63, 0.00) 0%, #2D313601 50.21%, #1f202245 60.21%, #2D313680 100%);
    border-radius: 12px;
    opacity: 1;
    z-index: 1;
}

.projects:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(57, 60, 63, 0.00) 0%, #2D313601 40.21%, #1f202245 60.21%, #2D313680 100%);
    border-radius: 12px;
    opacity: 0;
    transition: opacity 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
    z-index: 1;
}

.projects.interactive:hover:before {
    opacity: 1;
}

.projects__video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    border-radius: 12px;
    z-index: -1;
}

.projects__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width:fit-content;
    gap: 12px;
}

.projects__title {
    color: white;
    font-family: 'VCR OSD Mono', monospace;
    font-size: 24px;
    font-weight: 400;
    margin: 0;
    flex-grow: 1;
    z-index: 2;
    transition: transform 0.3s ease;
    transform: translateY(16px);
}


.projects__description {
    color:  #e7edf1;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    z-index: 2;
    transform: translateY(16px);
    transition: transform 0.3s ease;
}

.button-content {
    color: var(--color-light-gray-i);
    z-index: 2;
    font-family: 'VCR OSD Mono', monospace;
    font-size: 18px;
    font-weight: 400;
    margin: 0;
    height:18px;
    transform: translateY(16px);
    transition: transform 0.3s ease;
    opacity: 0;
    display: flex;
    align-items: center;
    gap: 4px;
}

.projects.interactive:hover .button-content {
    transform: translateY(0);
    transition: transform 0.3s ease;
    opacity: 1;
}

.projects.interactive:hover .projects__title, .projects.interactive:hover .projects__description {
    transform: translateY(0);
    transition: transform 0.3s ease;
}

.projects.interactive:nth-child(even) {
    transition: all 1.2s ease;
}

.projects.interactive:nth-child(:last-child) {
    transition: all 1.8s ease;
}




</style>