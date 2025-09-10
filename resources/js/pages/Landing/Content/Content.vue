<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';
import KeyContent from './KeyContent.vue';
import ListOfContent from './ListOfContent.vue';
import OtherProjectsGrid from './OtherProjectsGrid.vue';
import Experience from './Experience.vue';
import Whatsapp from './Whatsapp.vue';

const titleContainer = ref<HTMLElement | null>(null);
const keyContentRef = ref<HTMLElement | null>(null);
const otherProjectsRef = ref<HTMLElement | null>(null);
const experiencesRef = ref<HTMLElement | null>(null);
const contactRef = ref<HTMLElement | null>(null);
const paddingTop = ref(24); 
const backgroundOpacity = ref(0);
const activeSection = ref<'key-creations' | 'other-projects' | 'experiences' | 'contact'>('key-creations');

// Section configs
const sectionTitles = {
    'key-creations': {
        title: 'A highlight of my proudest',
        subtitle: 'CREATIONS',
        description: 'Peer into my beloved craft',
        subdescription: 'A product of ever-burning coffee addiction and Ylang Ylang tea.'
    },
    'other-projects': {
        title: 'A showcase of my other',
        subtitle: 'PROJECTS',
        description: 'Explore my diverse portfolio',
        subdescription: 'From experiments to client work, each tells a story.'
    },
    'experiences': {
        title: 'A journey through my',
        subtitle: 'EXPERIENCES',
        description: 'Professional milestones',
        subdescription: 'Where I learned, grew, and made impact.'
    },
    'contact': {
        title: 'Ready to start a',
        subtitle: 'CONVERSATION',
        description: 'Let\'s build something together',
        subdescription: 'Coffee chats and collaboration await.'
    }
};

const otherProjects = ref([
    {
        media: "/Assets/Images/AcademifyMAIN.png",
        title: "Academify",
        description: "Educational Application for Teachers and Students to manage their learning journey."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Singapore HDB Affordability Dashboard",
        description: "Modern e-commerce solution with advanced product catalog, secure payment processing, and comprehensive admin dashboard."
    },
    {
        media: "/Assets/Images/Content/Task Management.png",
        title: "Cassava Leaf Disease Classification",
        description: "Image Classification Model for Cassava Leaf Disease Detection."
    },
]);

const handleScroll = () => {
    if (!titleContainer.value) return;

    const rect = titleContainer.value.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    const threshold = windowHeight * 0.096;
    const elementTop = rect.top;
    if (elementTop <= threshold) {
        const maxDistance = threshold;
        const currentDistance = Math.max(0, elementTop);
        let progress = Math.max(0, Math.min(1, (threshold - currentDistance) / maxDistance));

        progress = 1 - Math.pow(1 - progress, 3);

        paddingTop.value = 24 + 76 * progress;
    } else {
        paddingTop.value = 24;
    }

    const startRevealPoint = windowHeight * 0.4;
    const fullOpacityPoint = 0;
    
    if (elementTop <= startRevealPoint && elementTop >= fullOpacityPoint) {
        const distance = elementTop - fullOpacityPoint;
        const maxDistance = startRevealPoint - fullOpacityPoint;
        const opacity = Math.max(0, Math.min(1, 1 - (distance / maxDistance)));
        backgroundOpacity.value = 1 - Math.pow(1 - opacity, 2);
    } else if (elementTop < fullOpacityPoint) {
        backgroundOpacity.value = 1;
    } else {
        backgroundOpacity.value = 0;
    }

    // Reuse windowHeight
    const scrollY = window.scrollY;
    const viewportCenter = scrollY + windowHeight / 2;
    if (keyContentRef.value && otherProjectsRef.value && experiencesRef.value && contactRef.value) {
        const keyContentRect = keyContentRef.value.getBoundingClientRect();
        const keyContentTop = scrollY + keyContentRect.top;
        const keyContentBottom = keyContentTop + keyContentRect.height;

        const otherProjectsRect = otherProjectsRef.value.getBoundingClientRect();
        const otherProjectsTop = scrollY + otherProjectsRect.top;
        const otherProjectsBottom = otherProjectsTop + otherProjectsRect.height;

        const experiencesRect = experiencesRef.value.getBoundingClientRect();
        const experiencesTop = scrollY + experiencesRect.top;
        const experiencesBottom = experiencesTop + experiencesRect.height;

        const contactRect = contactRef.value.getBoundingClientRect();
        const contactTop = scrollY + contactRect.top;
        const contactBottom = contactTop + contactRect.height;

        if (viewportCenter >= keyContentTop && viewportCenter < keyContentBottom) {
            activeSection.value = 'key-creations';
        } else if (viewportCenter >= otherProjectsTop && viewportCenter < otherProjectsBottom) {
            activeSection.value = 'other-projects';
        } else if (viewportCenter >= experiencesTop && viewportCenter < experiencesBottom) {
            activeSection.value = 'experiences';
        } else if (viewportCenter >= contactTop && viewportCenter < contactBottom) {
            activeSection.value = 'contact';
        }
    }
};

const scrollToSection = (section: 'key-creations' | 'other-projects' | 'experiences' | 'contact') => {
    let targetRef: HTMLElement | null = null;
    
    switch (section) {
        case 'key-creations':
            targetRef = keyContentRef.value;
            break;
        case 'other-projects':
            targetRef = otherProjectsRef.value;
            break;
        case 'experiences':
            targetRef = experiencesRef.value;
            break;
        case 'contact':
            targetRef = contactRef.value;
            break;
    }
    
    if (targetRef) {
        const rect = targetRef.getBoundingClientRect();
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const targetPosition = rect.top + scrollTop - 140;
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    }
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="content-background">
        <div class="background-image"></div>
        <div class="content-section">
        <ListOfContent :activeSection="activeSection" @scrollToSection="scrollToSection" />
        <div>
            <div class="title-container" ref="titleContainer">
                <div class="content-title">
                    <h2>{{ sectionTitles[activeSection].title }}</h2>
                    <h1>{{ sectionTitles[activeSection].subtitle }}</h1>
                </div>
                <div class="content-description">
                    <h3>{{ sectionTitles[activeSection].description }}</h3>
                    <h4>{{ sectionTitles[activeSection].subdescription }}</h4>
                </div>
            </div>
            <div class="content-items">
                <div class="key-content" ref="keyContentRef">
                    <KeyContent
                        media="/Assets/Videos/BIMain.mp4"
                        title="Portal Data External Bank Indonesia"
                        description="Central Bank of Indonesia's portal data site for external users to access monetary data."
                    />

                    <KeyContent
                        media="/Assets/Videos/ArchipelMain.mp4"
                        title="Archipel Map"
                        description="A modern, responsive portfolio website built with Laravel, Vue.js, and TypeScript. Features smooth animations, dynamic content, and a sleek design inspired by space aesthetics."
                    />

                    <KeyContent
                        media="/Assets/Images/Content/Task Management.png"
                        title="Task Management App"
                        description="Collaborative task management application with real-time updates, team collaboration features, and intuitive user interface."
                    />
                    <div class="key-content-footer">
                        <h2 style="font-size: 26px;">These pride-inducing creations from over the years</h2>
                        <p>Though there's plenty more below to see</p>
                        <h5>introducing...</h5>
                    </div>
                </div>
                <div ref="otherProjectsRef">
                    <OtherProjectsGrid :projects="otherProjects" />
                    <div class="key-content-footer" style="margin-top: 48px; padding-bottom: 0px;">
                        <p>Embarking on what made me, me..</p>
                        <h2 style="font-size: 26px;">Next Stop: Experiences</h2>
                        <h5>ride starts in 3.. 2.. 1..</h5>
                    </div>
                </div>
                <div ref="experiencesRef">
                    <Experience />
                    <div class="key-content-footer" style="margin-top: 48px;">
                        <p>Psst.. we're almost at the end..</p>
                        <h2 style="font-size: 26px;">Here's My Contact</h2>
                        <h5>Coffee dates await..</h5>
                    </div>
                </div>
                <div ref="contactRef">
                    <div class="contact-container">
                        <div class="contact-header">
                            <img src="/Assets/Icons/Mountain.svg" >
                            <div class="contact-head-title">
                                <h4 style="font-size: 20px; color: var(--color-light-gray-ii)">Email me <img src="/Assets/Icons/Email.svg" /></h4></div>
                            <div class="contact-email"><h2 style="font-size:28px;">daffamzulfikar@gmail.com</h2></div>
                            <h5 style="font-size: 18px; color: var(--color-light-gray-ii)">and check me out on..</h5>
                            <div class="contact-links">
                        <div style="display: flex; flex-direction: row; gap: 16px;"><a class="contact-link" href="https://www.linkedin.com/in/daffamzulfikar/" target="_blank"><img src="/Assets/Icons/LinkedIn.svg" >My LinkedIn</a>
                            <a class="contact-link" href="https://www.instagram.com/zurufikar/" target="_blank"><img src="/Assets/Icons/Instagram.svg">My Instagram</a></div>
                            <a class="contact-link" href="https://github.com/zurthr" target="_blank"><img src="/Assets/Icons/GitHub.svg">My GitHub</a>
                        </div>
                            <h5 style="font-size: 18px; color: var(--color-light-gray-ii)">Convince yourself further.</h5>
                        </div>
                        <Whatsapp />
                    </div>
                    <div class="key-content-footer" style="margin-top: 48px;">
                        <p>Seems like this is the edge..</p>
                        <h2 style="font-size: 22px;">Thank you for visiting!</h2>
                        <h5>Don't forget to say hi :]</h5>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<style scoped>
.contact-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.contact-head-title {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.contact-links {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width:fit-content;
    align-items: center;
    justify-content: center;
}
.contact-link {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    font-family: 'VCR OSD Mono';
    color: white;
    font-size: 18px;
    font-weight: 400;
    line-height: 24px;
    text-align: center;
    text-underline-offset: 4px;
    transition: all 0.5s ease;
}

.contact-link:hover {
    transform: scale(1.05);
    transition: all 0.5s ease;
}

.contact-email {
    display: flex;
    align-items: center;
    padding: 4px 8px;
    border-radius: 4px;
    border: 2px dashed white;
    width:fit-content;
    transition: all 0.5s ease;
}

.contact-email:hover {
    transform: scale(1.05);
    transition: all 0.5s ease;
    border: 2px solid white;
}
.title-container {
    display: flex;
    z-index: 100;
    position: sticky;
    top: 0px;
    flex-direction: row;
    gap: auto;
    width: 100%;
    padding: v-bind(paddingTop + 'px') 16px 8px 16px;
    background: linear-gradient(357deg, rgba(55, 59, 62, 0) 2.41%, #2D3136 54.12%), rgba(57, 60, 63, 0.2);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    margin-bottom: 24px;
}

.content-title {
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: -4px;
}

.content-description {
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: 4px;
    text-align: right;
}

.content-section {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    padding: 30px 72px 30px 72px;
    gap: 30px;
    flex-shrink: 0;
    width: 100vw;
    max-width: calc(1440px + 144px);
    align-self: center;
    justify-self: center;
    position: relative;
    z-index: 1;
}

.content-background {
    width: 100vw;
    position: relative;
}

.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('/Assets/Images/Footer2.png');
    background-size: cover;
    background-position: bottom;
    background-repeat: no-repeat;
    background-attachment: fixed;
    opacity: v-bind(backgroundOpacity);
    transition: opacity 0.1s ease-out;
    z-index: 0;
}

.content-items {
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100%;
    z-index: 1;
}

.key-content {
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100%;
    z-index: 1;
}

.key-content-footer {
    display: flex;
    flex-direction: column;
    gap: 4px;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding-bottom: 48px;
}

@media (max-width: 768px) {
    .content-items {
        gap: 16px;
    }
}
</style>
