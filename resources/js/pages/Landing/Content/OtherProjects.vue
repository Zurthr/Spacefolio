<template>
    <div 
        ref="keyContentRef" 
        class="projects"
        :class="[`projects--${props.layout}`, `projects--${props.size}`]"
        :style="{ 
            '--bg-image': isVideo ? 'none' : `url(${props.media})`
        }"
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
    layout?: 'left' | 'right' | 'centered';
    size?: 'large' | 'small';
}

const props = withDefaults(defineProps<Props>(), {
    media: '',
    layout: 'left',
    size: 'large',
});
const isVideo = computed(() => {
    const videoExtensions = ['.mp4', '.webm', '.ogg', '.mov', '.avi', '.mkv'];
    return videoExtensions.some(ext => props.media.toLowerCase().endsWith(ext));
});
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
    transition: all 0.3s ease;
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
    background: linear-gradient(180deg, rgba(57, 60, 63, 0.00) 0%, #2D313601 69.21%, #1f202245 80.21%, #2D313680 100%);
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

.projects:hover:before {
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

.projects:hover .button-content {
    transform: translateY(0);
    transition: transform 0.3s ease;
    opacity: 1;
}

.projects:hover .projects__title, .projects:hover .projects__description {
    transform: translateY(0);
    transition: transform 0.3s ease;
}

/* Layout variants */
.projects--right .projects__header {
    align-items: flex-end;
    text-align: right;
}

.projects--right .projects__description {
    text-align: right;
}

.projects--right .button-content {
    justify-content: flex-end;
    flex-direction: row-reverse;
}

.projects--centered {
    max-width: 600px;
    margin: 0 auto;
}

.projects--centered .projects__header {
    align-items: center;
    text-align: center;
    width: 100%;
    justify-content: center;
}

.projects--centered .projects__description {
    text-align: center;
}

.projects--centered .button-content {
    justify-content: center;
}

.projects--large {
    height: 100%;
    min-height: 250px;
    max-height: 550px;
    width:100%;
}

.projects--small {
    height: 100%;
    min-height: 250px;
    max-height: 550px;
    width:100%;

}

</style>