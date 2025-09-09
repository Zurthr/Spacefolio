<template>
    <div class="experiences-container">
        <img src="/Assets/Images/expheader.svg" class="expheader" ref="headerRef">
        <div style="display: flex; flex-direction: column; gap: 0px; align-items: center; justify-content: center; z-index: 100; margin-top:-40px;">
            <h3 style="font-size: 18px;">what <u>defined</u> me, <u>built</u> me</h3>
            <h4 style="font-size: 14px;">to carry my dreams upon my back.</h4>
        </div>
        <div 
            v-for="company in groupedExperiences" 
            :key="company.id"
            class="company-group"
            ref="experienceRefs"
        >
            <div class="company-header">
                <h3 class="company-name">{{ company.name }}</h3>
                <div class="company-duration">
                    <span class="duration-text">{{ getCompanyDuration(company) }}</span>
                </div>
            </div>

            <div class="experiences-list">
                <div 
                    v-for="(experience, index) in company.experiences" 
                    :key="index"
                    class="experience-item"
                    :class="{ 'last-experience': index === company.experiences.length - 1 }"
                >
                    <div class="experience-content">
                        <div class="experience-main">
                            <h4 class="experience-title">{{ experience.title }}</h4>
                            <div class="experience-duration">{{ experience.duration }}</div>
                        </div>
                        <p v-if="experience.description" class="experience-description">
                            {{ experience.description }}
                        </p>
                        <div v-if="experience.achievements && experience.achievements.length > 0" class="achievements">
                            <ul class="achievements-list">
                                <li v-for="achievement in experience.achievements" :key="achievement">
                                    {{ achievement }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue';

interface Experience {
    companyId: string;
    title: string;
    duration: string;
    startDate?: Date;
    endDate?: Date;
    description?: string;
    achievements?: string[];
}

interface Company {
    id: string;
    name: string;
    experiences: Experience[];
}

interface ExperienceProps {
    experiences?: Experience[];
}

const companyNames: Record<string, string> = {
    'iisma': 'IISMA (Indonesian International Student Mobility Awards)',
    'BI': 'Bank Indonesia (Central Bank of Indonesia)',
    'AIESEC': 'AIESEC',
    'Archipel': 'Archipel Advisory Indonesia',
    'daspro': 'DASPRO Laboratory',
    'SES': 'Student English Society'
};

const props = withDefaults(defineProps<ExperienceProps>(), {
    experiences: () => [
        {
            companyId: 'BI',
            title: 'Software Engineer Intern',
            duration: 'July 2025 - September 2025',
            startDate: new Date('2025-07-07'),
            endDate: new Date('2025-9-14'),
            description: 'Performed as a Software Engineer Intern at Bank Indonesia\'s Data and Innovation Department. Created Portal Data External\'s front office as a Single Page Application via Vue.JS. Earned extension offers, and an award for the best participant during a Design Thinking event. ',

        },
        {
            companyId: 'AIESEC',
            title: 'TM Team Lead - AIESEC in Singapore',
            duration: 'August 2024 - December 2024',
            startDate: new Date('2024-08-01'),
            endDate: new Date('2024-12-2'),
            description: 'Coordinated and Emceed weekly Local Commitee Meetings, handled various divisional team issues, bridged connection between internal and external parties. Worked with OGx to attain +200 NTU exchange participants across the globe.' 
        },
        {
            companyId: 'AIESEC',
            title: 'Outgoing Exchange OC - AIESEC in Bandung',
            duration: 'November 2023 - January 2024',
            startDate: new Date('2023-11-01'),
            endDate: new Date('2024-01-2'),
            description: 'Lead the NTU IISMA Awardees, coordinating with Kemendikbud\'s IISMA office, GEM NTU, and Indonesian Embassy in Singapore to create impactful events throughout the duration of the program.',
        },
        {
            companyId: 'iisma',
            title: 'Student Representative of Nanyang Technological University, Singapore',
            duration: 'March 2024 - February 2025',
            startDate: new Date('2024-03-01'),
            endDate: new Date('2025-02-2'),
            description: 'Lead the NTU IISMA Awardees, coordinating with Kemendikbud\'s IISMA office, GEM NTU, and Indonesian Embassy in Singapore to create impactful events throughout the duration of the program.',
        },
        {
            companyId: 'daspro',
            title: 'Data Mining Coordinator - DASPRO Laboratory ',
            duration: 'March 2025 - July 2025',
            startDate: new Date('2025-03-01'),
            endDate: new Date('2025-07-2'),
            description: 'Lead the Data Mining practicum for over 900 students at Telkom University, coordinating with lecturers, laboratories, and the dean of FRI.',
        },
        {
            companyId: 'SES',
            title: 'President / Chairman',
            duration: 'November 2024 - Present',
            startDate: new Date('2024-11-01'),
            endDate: new Date('2025-11-31'),
            description: 'General President of SES 2024/2025, leading the organization to achieve a major rebranding and change. Working to create a new SES website and detach from PUTI Telkom.',
        },
        {
            companyId: 'SES',
            title: 'Project Manager',
            duration: 'January 2024 - May 2024',
            startDate: new Date('2024-01-01'),
            endDate: new Date('2024-05-2'),
            description: 'Project Manager of multiple SES projects.',
        }

    ]
});

const experienceRefs = ref<HTMLElement[]>([]);
const headerRef = ref<HTMLElement | null>(null);

const groupedExperiences = computed<Company[]>(() => {
    const companies = new Map<string, Company>();
    
    props.experiences.forEach(experience => {
        if (!companies.has(experience.companyId)) {
            const companyName = companyNames[experience.companyId] || 'Unknown Company';
            companies.set(experience.companyId, {
                id: experience.companyId,
                name: companyName,
                experiences: []
            });
        }
        
        companies.get(experience.companyId)!.experiences.push(experience);
    });
    
    companies.forEach(company => {
        company.experiences.sort((a, b) => {
            if (a.startDate && b.startDate) {
                return b.startDate.getTime() - a.startDate.getTime();
            }
            return 0;
        });
    });
    
    return Array.from(companies.values()).sort((a, b) => {
        const latestA = a.experiences[0]?.startDate || new Date(0);
        const latestB = b.experiences[0]?.startDate || new Date(0);
        return latestB.getTime() - latestA.getTime();
    });
});

function getCompanyDuration(company: Company): string {
    if (company.experiences.length === 0) return '';
    
    let earliestStart: Date | null = null;
    let latestEnd: Date | null = null;
    
    company.experiences.forEach(exp => {
        if (exp.startDate) {
            if (!earliestStart || exp.startDate < earliestStart) {
                earliestStart = exp.startDate;
            }
        }
        if (exp.endDate) {
            if (!latestEnd || exp.endDate > latestEnd) {
                latestEnd = exp.endDate;
            }
        }
    });
    
    if (earliestStart && latestEnd) {
        const startMonth = (earliestStart as Date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
        const endMonth = (latestEnd as Date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
        return `${startMonth} - ${endMonth}`;
    }
    
    return company.experiences[0]?.duration || '';
}

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -10% 0px'
};

let observer: IntersectionObserver | null = null;

onMounted(() => {
    observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe header
    if (headerRef.value) {
        observer.observe(headerRef.value);
    }
    
    // Observe experience groups
    experienceRefs.value.forEach(ref => {
        if (ref) observer?.observe(ref);
    });
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>
.experiences-container {
    display: flex;
    flex-direction: column;
    gap: 48px;
    width: 100%;
    padding: 24px 0;
}

.expheader {
    justify-self: center;
    align-self: center;
    width: 70%;
    opacity: 0;
    transform: translateY(80px);
    margin-top: -32px;
    transition: all 2s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.expheader.animate-in {
    opacity: 1;
    transform: translateY(0);
}

.expheader.animate-in:hover {
    transform: translateY(-5px) scale(1.08);
    transition: all 1.2s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.company-group {
    display: flex;
    flex-direction: column;
    gap: 16px;
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.company-group.animate-in {
    opacity: 1;
    transform: translateY(0);
}

.company-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 24px;
    padding-bottom: 8px;
    border-bottom: 1px solid var(--color-gray-i);
}

.company-name {
    color: white;
    font-family: 'VCR OSD Mono', monospace;
    font-size: 24px;
    font-weight: 400;
    margin: 0;
    flex: 1;
    line-height: 1.2;
}

.company-duration {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    flex-shrink: 0;
}

.duration-text {
    color: var(--color-light-gray-i);
    font-family: 'VCR OSD Mono', monospace;
    font-size: 18px;
    font-weight: 400;
    text-align: right;
    white-space: nowrap;
}

.experiences-list {
    display: flex;
    flex-direction: column;
    gap: 32px;
    position: relative;
}

.experience-item {
    position: relative;
    padding-left: 16px;
}

.experience-item:hover::before {
    background-color: var(--color-blue);
    transform: scale(1.2);
}

.experience-content {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.experience-main {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 24px;
    flex-wrap: wrap;
}

.experience-title {
    color: var(--color-light-gray-iii);
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 500;
    margin: 0;
    flex: 1;
    min-width: 200px;
}

.experience-duration {
    color: var(--color-light-gray-i);
    font-family: 'VCR OSD Mono', monospace;
    font-size: 16px;
    font-weight: 400;
    flex-shrink: 0;
    text-align: right;
}

.experience-description {
    color: var(--color-light-gray-i);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.6;
    margin: 0;
}

.achievements {
    margin-top: 8px;
}

.achievements-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.achievements-list li {
    color: var(--color-light-gray-ii);
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    padding-left: 20px;
    position: relative;
}

.achievements-list li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--color-blue);
    font-weight: bold;
}

/* Responsive Design */
@media (max-width: 768px) {
    .experiences-container {
        gap: 32px;
        padding: 16px 0;
    }
    
    .company-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .company-name {
        font-size: 24px;
    }
    
    .duration-text {
        font-size: 16px;
        text-align: left;
    }
    
    .experience-main {
        flex-direction: column;
        gap: 8px;
    }
    
    .experience-title {
        font-size: 20px;
        min-width: unset;
    }
    
    .experience-duration {
        text-align: left;
        font-size: 14px;
    }
    
    .experiences-list {
        padding-left: 16px;
    }
    
    .experience-item {
        padding-left: 24px;
    }
}

@media (max-width: 480px) {
    .company-name {
        font-size: 20px;
        line-height: 1.3;
    }
    
    .experience-title {
        font-size: 18px;
    }
    
    .experience-description {
        font-size: 15px;
    }
    
    .achievements-list li {
        font-size: 14px;
    }
}
</style>
