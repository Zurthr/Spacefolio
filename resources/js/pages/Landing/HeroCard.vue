<template>
  <div 
    class="hero-card" 
    :class="{ 'hero-card--main': isMainSkill }"
  >
    <img 
      :src="imageIcon" 
      :alt="name"
      class="hero-card__icon"
      :class="{ 'hero-card__icon--main': isMainSkill }"
    />
    <h3 
      class="hero-card__name"
      :class="{ 'hero-card__name--main': isMainSkill }"
      :style="{ color: color || 'white' }"
    >
      {{ name }}
    </h3>
  </div>
</template>

<script setup lang="ts">
interface Props {
  isMainSkill?: boolean;
  imageIcon: string;
  name: string;
  color?: string;
}

defineProps<Props>();
</script>

<style scoped>
.hero-card {
  display: flex;
  padding: 4px;
  justify-content: center;
  align-items: flex-start;
  gap: 8px;
  border-radius: 4px;
  background: #27292A;
  padding:4px;
  width:fit-content;
}

.hero-card:hover {
  background: rgba(57, 60, 63, 0.4);
  transform: translateY(-2px);
  border-color: rgba(255, 255, 255, 0.2);
}

.hero-card--main {
  font-size: 20px;
  font-weight: 400;
}

.hero-card__icon {
  width: 20px;
  height: 20px;
  object-fit: contain;
  filter: brightness(1.1);
  transition: transform 0.3s ease;
}

.hero-card__icon--main {
  width: 24px;
  height: 24px;
}

.hero-card:hover .hero-card__icon {
  transform: scale(1.1);
}

.hero-card__name {
  font-family: 'VCR OSD Mono', sans-serif;
  margin: 0;
  text-align: left;
  font-size: 17px;
  font-weight: 400;
}

.hero-card__name--main {
  font-size: 18px;
  font-weight: 400;
}

</style>
