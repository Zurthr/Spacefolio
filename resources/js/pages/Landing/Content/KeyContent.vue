<template>
    <div 
        ref="keyContentRef" 
        class="key-content"
        :style="{ 
            transform: `scale(${transformScale})`,
            '--bg-image': isVideo ? 'none' : `url(${props.media})`
        }"
    >
        <video 
            v-if="isVideo"
            class="key-content__video"
            :src="props.media"
            autoplay
            loop
            muted
            playsinline
        ></video>
        
        <div class="key-content__header">
            <h3 class="key-content__title">{{ title }}</h3>
        </div>

        <p class="key-content__description">{{ description }}</p>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue';

interface Props {
    title: string;
    description: string;
    media: string;
}

const props = withDefaults(defineProps<Props>(), {
    media: '',
});

// Check if the media is a video file
const isVideo = computed(() => {
    const videoExtensions = ['.mp4', '.webm', '.ogg', '.mov', '.avi', '.mkv'];
    return videoExtensions.some(ext => props.media.toLowerCase().endsWith(ext));
});

const keyContentRef = ref<HTMLElement | null>(null);
const transformScale = ref(0.7);

const updateTransform = () => {
    if (!keyContentRef.value) return;

    const rect = keyContentRef.value.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    
    const elementCenter = rect.top;
    const viewportPercentage = (windowHeight - elementCenter) / windowHeight;
    

    const startTransform = 0.025;
    const endTransform = 0.4;   
    
    if (viewportPercentage <= startTransform) {
        // min scale
        transformScale.value = 0.8;
    } else if (viewportPercentage >= endTransform) {
        // max scale
        transformScale.value = 1;
    } else {
        const progress = (viewportPercentage - startTransform) / (endTransform - startTransform);
        transformScale.value = 0.8 + (0.2 * progress);
    }
};

onMounted(() => {
    updateTransform();
    window.addEventListener('scroll', updateTransform);
    window.addEventListener('resize', updateTransform);
});

onUnmounted(() => {
    window.removeEventListener('scroll', updateTransform);
    window.removeEventListener('resize', updateTransform);
});
</script>

<style scoped>
.key-content {
    display: flex;
    flex-direction: column;
    background-image: var(--bg-image);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    gap: 12px;
    padding: 24px;
    border-radius: 12px;
    background-color: var(--color-dark-gray-i, #27292a);
    transition: all 0.3s ease;
    cursor: pointer;
    height: 60vh;
    justify-self: center;
    align-self: center;
    width: 96%;
    transform-origin: center;
    justify-content: flex-end;
    min-height:600px;
    max-height: 800px;
    position: relative;
    overflow: hidden;
}

.key-content:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, 
        rgba(57, 60, 63, 0.3) 0%, 
 
        rgba(57, 60, 63, 0.4) 100%
    );
    border-radius: 12px;
    opacity: 1;
    transition: all 1s ease;
    z-index: 1;
}

.key-content:hover:after {
    background: linear-gradient(to bottom, 
        rgba(57, 60, 63, 0) 0%, 
        rgba(57, 60, 63, 0) 60%,
        rgba(57, 60, 63, 0.3) 80%,  
        rgba(57, 60, 63, 0.4) 100%
    );
    transition: all 1s ease;
}

.key-content__video {
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

.key-content__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
}

.key-content__title {
    color: white;
    font-family: 'VCR OSD Mono', monospace;
    font-size: 24px;
    font-weight: 400;
    margin: 0;
    flex-grow: 1;
    z-index: 2;
}


.key-content__description {
    color:  #e7edf1;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    z-index: 2;
}

/* Responsive design */
@media (max-width: 768px) {
    .key-content {
        padding: 16px;
    }

    .key-content__title {
        font-size: 20px;
    }

    .key-content__type {
        font-size: 12px;
    }

    .key-content__description {
        font-size: 14px;
    }
}
</style>
