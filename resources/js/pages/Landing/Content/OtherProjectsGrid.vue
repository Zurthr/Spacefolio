<template>
    <div class="other-projects">
        <div 
            v-for="(row, rowIndex) in projectRows" 
            :key="rowIndex"
            class="projects-row"
            :class="{ 'single-project': row.isSingle }"
        >
            <OtherProjects
                v-for="(project, projectIndex) in row.projects"
                :key="`${rowIndex}-${projectIndex}`"
                :media="project.media"
                :title="project.title"
                :description="project.description"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import OtherProjects from '../../../components/Landing/OtherProjects.vue';

interface Project {
    media: string;
    title: string;
    description: string;
}

interface Props {
    projects: Project[];
}

const props = defineProps<Props>();
const projectRows = computed(() => {
    const rows = [];
    for (let i = 0; i < props.projects.length; i += 2) {
        const rowProjects = props.projects.slice(i, i + 2);
        rows.push({
            projects: rowProjects,
            isSingle: rowProjects.length === 1
        });
    }
    return rows;
});
</script>

<style scoped>
.other-projects {
    display: flex;
    flex-direction: column;
    gap: 32px;
    width: 100%;
    padding: 0 24px;
}

.projects-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    width: 100%;
}

.projects-row.single-project {
    grid-template-columns: 1.3fr 0.7fr;
}

.projects-row.single-project :deep(.projects) {
    grid-column: 1;
}

.other-projects :deep(.projects) {
    width: 100%;
    height: 400px;
}

@media (max-width: 768px) {
    .other-projects {
        gap: 40px;
        padding: 0 20px;
    }
    
    .projects-row {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .projects-row.single-project {
        grid-template-columns: 1fr;
    }
    
    .projects-row.single-project :deep(.projects:last-child) {
        display: block;
    }
}
</style>
