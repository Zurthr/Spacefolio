<template>
<div class="skill-container">
    <HeroCard 
        :isMainSkill="true"
        imageIcon="/Assets/Icons/SkillDino.svg"
        name="Web Dev."
        color="var(--color-light-green-i)"
        />
    <HeroCard 
        :isMainSkill="true"
        imageIcon="/Assets/Icons/SkillFE.svg"
        name="Front-End Dev."
        color="var(--color-blue)"
        />
    <HeroCard 
        :isMainSkill="true"
        imageIcon="/Assets/Icons/SkillUI.svg"
        name="UI Design"
        color="var(--color-orange-ii)"
        />
    <HeroCard 
        :isMainSkill="true"
        imageIcon="/Assets/Icons/SkillData.svg"
        name="UI Design"
        color="var(--color-orange-ii)"
        />
</div>
</template>

<script setup lang="ts">
import HeroCard from './HeroCard.vue';
</script>

<style scoped>

</style>