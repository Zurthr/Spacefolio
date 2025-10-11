<template>
    <div 
        ref="keyContentRef" 
        class="key-content-item"
        :style="{ 
            transform: `scale(${transformScale})`,
            '--bg-image': isVideo ? 'none' : `url(${props.media})`
        }"
		@click="handleClick"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
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
        <p class="button-content"><img src="/Assets/Icons/Binoculars.svg">Peer deeper..</p>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed, inject } from 'vue';



type OpenModalOptions = { title?: string; message?: string; variantId?: number };

interface Props {
    title: string;
    description: string;
    media: string;
    redirectUrl?: string;
    openModal: (options?: OpenModalOptions) => void;
}

const props = withDefaults(defineProps<Props>(), {
    media: '',
    redirectUrl: '',
    openModal: () => {},
});

const handleClick = () => {
    if (props.redirectUrl) {
        // Redirect to the specified URL
        window.open(props.redirectUrl, '_blank');
    } else {
        // Open the modal for "under construction"
        props.openModal({ variantId: 1 });
    }
};

// Check if the media is a video file
const isVideo = computed(() => {
    const videoExtensions = ['.mp4', '.webm', '.ogg', '.mov', '.avi', '.mkv'];
    return videoExtensions.some(ext => props.media.toLowerCase().endsWith(ext));
});

const keyContentRef = ref<HTMLElement | null>(null);
const transformScale = ref(0.7);
const isHovered = ref(false);
const isFullScale = ref(false);

const updateTransform = () => {
    if (!keyContentRef.value) return;

    const rect = keyContentRef.value.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    
    const elementCenter = rect.top;
    const viewportPercentage = (windowHeight - elementCenter) / windowHeight;
    

    const startTransform = 0.025;
    const endTransform = 0.4;   
    
    let baseScale = 0.8;
    
    if (viewportPercentage <= startTransform) {
        baseScale = 0.8;
        isFullScale.value = false;
    } else if (viewportPercentage >= endTransform) {
        baseScale = 1;
        isFullScale.value = true;
    } else {
        const progress = (viewportPercentage - startTransform) / (endTransform - startTransform);
        baseScale = 0.8 + (0.2 * progress);
        isFullScale.value = false;
    }
    
    if (isFullScale.value && isHovered.value) {
        transformScale.value = baseScale * 1.02;
    } else {
        transformScale.value = baseScale;
    }
};

const handleMouseEnter = () => {
    isHovered.value = true;
    updateTransform();
};

const handleMouseLeave = () => {
    isHovered.value = false;
    updateTransform();
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
.key-content-item {
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
    transition: all 0.3s ease, transform 0.3s ease;
    cursor: pointer;
    height: 60vh;
    justify-self: center;
    align-self: center;
    width: 96%;
    transform-origin: center;
    justify-content: flex-end;
    min-height:720px;
    max-height: 800px;
    position: relative;
    overflow: hidden;
}

.key-content-item-item:after {
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

.key-content-item:before {
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

.key-content-item:hover:before {
    opacity: 1;
}

.key-content__video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 12px;
    z-index: -1;
}

.key-content__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width:fit-content;
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
    transition: transform 0.3s ease;
    transform: translateY(16px);
}



.key-content__description {
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

.key-content-item:hover .button-content {
    transform: translateY(0);
    transition: transform 0.3s ease;
    opacity: 1;
}



.key-content-item:hover .key-content__title, .key-content-item:hover .key-content__description {
    transform: translateY(0);
    transition: transform 0.3s ease;
}

/* Responsive design */
@media (max-width: 768px) {
    .key-content-item {
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
