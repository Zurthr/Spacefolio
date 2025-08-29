<template>
    <div class="skill-container">
        <HeroCard :isMainSkill="true" imageIcon="/Assets/Icons/SkillDino.svg" name="Web Dev." color="var(--color-light-green-i)" />
        <HeroCard :isMainSkill="true" imageIcon="/Assets/Icons/SkillFE.svg" name="Front-End Dev." color="var(--color-blue)" />
        <HeroCard :isMainSkill="true" imageIcon="/Assets/Icons/SkillUI.svg" name="UI Design" color="var(--color-orange-ii)" />
        <HeroCard :isMainSkill="true" imageIcon="/Assets/Icons/SkillData.svg" name="Data Eng." color="var(--color-red-ii)" />
        <!-- Non main skillss gais -->
        <HeroCard imageIcon="/Assets/Icons/Laravel.svg" name="Laravel" />
        <HeroCard imageIcon="/Assets/Icons/Nuxt.svg" name="Nuxt" />
        <HeroCard imageIcon="/Assets/Icons/Vue.svg" name="Vue" />
        <HeroCard imageIcon="/Assets/Icons/React.svg" name="React" />
        <HeroCard imageIcon="/Assets/Icons/Framer.svg" name="Framer" />
        <HeroCard imageIcon="/Assets/Icons/Tableau.svg" name="Tableau" />
    </div>
</template>

<script setup lang="ts">
import HeroCard from './HeroCard.vue';
</script>

<style scoped>
.skill-container {
    display: flex;
    width: 100%;
    align-items: center;
    align-content: center;
    gap: 10px;
    flex-wrap: wrap;
}
</style>
