<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

interface CarouselImage {
  src: string;
  alt: string;
}

interface Props {
  images: CarouselImage[];
  autoPlayInterval?: number;
}

const props = withDefaults(defineProps<Props>(), {
  autoPlayInterval: 3000
});

const currentIndex = ref(0);
let autoPlayTimer: number | null = null;

const nextImage = () => {
  currentIndex.value = (currentIndex.value + 1) % props.images.length;
};

const getImagePosition = (index: number) => {
  const diff = index - currentIndex.value;
  const totalImages = props.images.length;
  
  // Normalize the difference to be between -totalImages/2 and totalImages/2
  let normalizedDiff = diff;
  if (normalizedDiff > totalImages / 2) {
    normalizedDiff -= totalImages;
  } else if (normalizedDiff < -totalImages / 2) {
    normalizedDiff += totalImages;
  }
  
  return normalizedDiff;
};

const getImageStyle = (index: number) => {
  const position = getImagePosition(index);
  const absPosition = Math.abs(position);
  
  // Z-index: active image has highest z-index, others decrease based on distance
  const zIndex = position === 0 ? 100 : 100 - absPosition;
  
  // Scale: active image is full size, others get smaller as they go back
  const scale = position === 0 ? 1 : Math.max(0.7, 1 - absPosition * 0.15);
  
  // Opacity: active image is full opacity, others fade progressively
  const opacity = position === 0 ? 1 : Math.max(0.4, 1 - absPosition * 0.2);
  
  // X translation for overlapping positioning - smaller gaps for overlap effect
  const translateX = position * 150; // Much smaller gap for overlapping
  
  // Z translation to create depth effect (moving to back)
  const translateZ = -absPosition * 50;
  
  return {
    transform: `translateX(${translateX}px) translateZ(${translateZ}px) scale(${scale})`,
    opacity: opacity,
    zIndex: zIndex,
    filter: position === 0 ? 'brightness(1)' : `brightness(${Math.max(0.5, 1 - absPosition * 0.25)})`
  };
};

const startAutoPlay = () => {
  autoPlayTimer = setInterval(nextImage, props.autoPlayInterval);
};

onMounted(() => {
  startAutoPlay();
});

onUnmounted(() => {
  if (autoPlayTimer) {
    clearInterval(autoPlayTimer);
  }
});
</script>

<template>
  <div class="carousel-container">
    <div class="carousel-wrapper">
      <div class="carousel-track">
        <div
          v-for="(image, index) in images"
          :key="index"
          class="carousel-item"
          :style="getImageStyle(index)"
        >
          <img
            :src="image.src"
            :alt="image.alt"
            class="carousel-image"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.carousel-container {
  position: relative;
  width: 100%;
  height: 30vh;
  max-height: 400px;
  min-height: 350px;
  perspective: 1000px;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.carousel-wrapper {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.carousel-track {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  transform-style: preserve-3d;
}

.carousel-item {
  position: absolute;
  width: 600px;
  height: 30vh;
  max-height: 400px;
  min-height: 350px;
  transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transform-origin: center center;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.carousel-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 12px;
  transition: all 0.8s ease;
}

/* Responsive design */
@media (max-width: 768px) {
  .carousel-item {
    width: 80vw;
    max-width: 400px;
  }
}

@media (max-width: 480px) {
  .carousel-item {
    width: 90vw;
    max-width: 300px;
  }
  
  .carousel-container {
    height: 35vh;
  }
  
  .carousel-item {
    height: 35vh;
  }
}
</style>
