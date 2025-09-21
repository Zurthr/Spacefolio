<script setup lang="ts">
import { computed } from 'vue';

interface Props {
  isOpen: boolean;
  title?: string;
  message?: string;
  variantId?: number;
}

interface Emits {
  (e: 'close'): void;
}

const props = withDefaults(defineProps<Props>(), {
  title: 'Still a work in progress :)',
  message: 'This feature is coming soon! Check back later.'
});

const emit = defineEmits<Emits>();

const closeModal = () => {
  emit('close');
};

const computedTitle = computed(() => {
  switch (props.variantId) {
    case 1:
      return "Still in the works!";
    default:
      return props.title;
  }
});

const computedMessage = computed(() => {
  switch (props.variantId) {
    case 1:
      return 'Writing this right now.. Check back next time';
    default:
      return props.message;
  }
});
</script>

<template>
  <Teleport to="body">
    <div v-if="isOpen" class="modal-overlay" @click="closeModal" :class="{ 'modal-overlay-out': !isOpen }">
      <div class="modal-content" @click.stop>
        <!-- <button class="modal-close" @click="closeModal">&times;</button> -->
        <img src="/Assets/Images/Smolverse-Type.gif" style="width: auto; height: 80px; margin-top:-20px; border-radius: 16px;" >
        <div class="modal-body">
          <h2 class="modal-title">{{ computedTitle }}</h2>
          <p class="modal-message">{{ computedMessage }}</p>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<style scoped>
/* Modal Styles */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2000;
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
}

.modal-overlay-out {
  animation: modalSlideOut 0.3s ease-out;
}

.modal-content {
  background: linear-gradient(135deg, #2D3136 0%, #373B3E 100%);
  border-radius: 16px;
  padding: 24px;
  gap:16px;
  max-width: 600px;
  height: 110px;
  width: fit-content;
  position: relative;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  animation: modalSlideIn 0.3s ease-out;
  display: flex;
}

@keyframes modalSlideIn {
  from {
    opacity: 0;
    transform: translateY(-20px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

@keyframes modalSlideOut {
  from {
    opacity: 0;
    transform: translateY(20px) scale(0.95);
  }
  to {
    opacity: 0;
    transform: translateY(0) scale(1);
  }
}

.modal-close {
  position: absolute;
  top: 16px;
  right: 20px;
  background: none;
  border: none;
  color: #fff;
  font-size: 32px;
  cursor: pointer;
  padding: 0;
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: all 0.2s ease;
}

.modal-close:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: scale(1.1);
}

.modal-body {
    text-align: left;
    color: #fff;
    height:60px;
}

.modal-title {
  font-family: 'VCR OSD Mono', monospace;
  font-size: 24px;
  color: #fff;
  text-align: left;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.modal-message {
  font-size: 16px;
  color: rgba(255, 255, 255, 0.8);
  margin: 0;
  line-height: 1.5;
  margin-top:8px;
}

/* Responsive modal */
@media (max-width: 768px) {
  .modal-content {
    padding: 24px;
    margin: 20px;
  }
  
  .modal-title {
    font-size: 20px;
  }
  
  .modal-message {
    font-size: 14px;
  }
}
</style>
