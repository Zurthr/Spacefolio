<template>
    <div 
        ref="keyContentRef" 
        class="key-content"
        :style="{ 
            transform: `scale(${transformScale})`,
            '--bg-image': `url(${props.img})`
        }"
    >
        <div class="key-content__header">
            <h3 class="key-content__title">{{ title }}</h3>
        </div>

        <p class="key-content__description">{{ description }}</p>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

interface Props {
    title: string;
    description: string;
    img: string;
}

const props = withDefaults(defineProps<Props>(), {
    img: '',
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
    border: 2px solid transparent;
    height: 60vh;
    justify-self: center;
    align-self: center;
    width: 96%;
    transform-origin: center;
    justify-content: flex-end;
}

.key-content:hover {
    background: rgba(57, 60, 63, 0.4);
    border-color: rgba(255, 255, 255, 0.1);
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
}

.key-content__type {
    color: var(--color-light-gray-i, #989da2);
    font-family: 'VCR OSD Mono', monospace;
    font-size: 14px;
    font-weight: 400;
    padding: 4px 8px;
    background: rgba(57, 60, 63, 0.6);
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    flex-shrink: 0;
}

.key-content--highlight .key-content__type {
    background: rgba(218, 227, 177, 0.2);
    color: #dae3b1;
}

.key-content--project .key-content__type {
    background: rgba(168, 230, 255, 0.2);
    color: #a8e6ff;
}

.key-content__description {
    color: var(--color-light-gray-ii, #ccd3d9);
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
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
