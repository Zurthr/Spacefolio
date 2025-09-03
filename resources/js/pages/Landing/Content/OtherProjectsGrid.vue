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
                :layout="project.layout"
                :size="project.size"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import OtherProjects from './OtherProjects.vue';

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
        const rowIndex = Math.floor(i / 2);
        
        // Mappers
        const projectsWithLayout = rowProjects.map((project, projectIndex) => {
            let layout: 'left' | 'right' | 'centered';
            let size: 'large' | 'small';
            
            if (rowProjects.length === 1) {
                layout = 'centered';
                size = 'large';
            } else {
                const isEvenRow = rowIndex % 2 === 0;
                
                if (isEvenRow) {
                    layout = projectIndex === 0 ? 'left' : 'right';
                    size = projectIndex === 0 ? 'large' : 'small';
                } else {
                    layout = projectIndex === 0 ? 'right' : 'left';
                    size = projectIndex === 0 ? 'small' : 'large';
                }
            }
            
            return {
                ...project,
                layout,
                size
            };
        });
        
        rows.push({
            projects: projectsWithLayout,
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
    gap: 24px;
    width: 100%;
    z-index: -1;
}

.projects-row {
    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: 24px;
    height:40vh;
    width: 96%;
    justify-self: center;
    align-items: start;
    align-self: center;
}

.projects-row:nth-child(even) {
    grid-template-columns: 1fr 1.3fr;
}

.projects-row.single-project {
    display: flex;
    justify-content: center;
}

@media (max-width: 768px) {
    .projects-row {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .projects-row.single-project {
        display: grid;
        grid-template-columns: 1fr;
    }
}
</style>
