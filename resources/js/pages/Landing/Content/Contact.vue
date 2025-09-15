<script setup lang="ts">
import { ref } from 'vue';
import Whatsapp from './Whatsapp.vue';
import ImageCarousel from '../../../components/Landing/ImageCarousel.vue';

interface Props {
    isWhatsAppFormExpanded?: boolean;
}

interface Emits {
    (e: 'form-toggled', isExpanded: boolean): void;
}

const props = withDefaults(defineProps<Props>(), {
    isWhatsAppFormExpanded: false
});

const emit = defineEmits<Emits>();

const handleWhatsAppFormToggle = (isExpanded: boolean) => {
    emit('form-toggled', isExpanded);
};

// Sample images for the carousel - you can replace these with your actual images
const carouselImages = ref([
    {
        src: '/Assets/Images/AcademifyMAIN.png',
        alt: 'Academify Project'
    },
    {
        src: '/Assets/Images/Content/Task Management.png',
        alt: 'Task Management App'
    },
    {
        src: '/Assets/Images/Footer2.png',
        alt: 'Portfolio Background'
    },
    {
        src: '/Assets/Icons/LinkedIn.svg',
        alt: 'LinkedIn'
    },
    {
        src: '/Assets/Icons/GitHub.svg',
        alt: 'GitHub'
    },
    {
        src: '/Assets/Icons/Instagram.svg',
        alt: 'Instagram'
    },
    {
        src: '/Assets/Icons/Email.svg',
        alt: 'Email'
    }
]);
</script>

<template>
    <div class="carousel-section">
        <ImageCarousel :images="carouselImages" :autoPlayInterval="4000" />
    </div>
    <div class="contact-container" :class="{ 'expanded-layout': isWhatsAppFormExpanded }">
        <div class="contact-header">
            <div class="contact-head-title">
                <h4 style="font-size: 20px; color: var(--color-light-gray-ii)">Email me <img src="/Assets/Icons/Email.svg" /></h4>
                <div class="contact-email"><h2 style="font-size:20px;">daffamzulfikar@gmail.com</h2>
                </div>
            </div>
            <!-- <img src="/Assets/Icons/Rocket.svg" > -->
            <div class="contact-head-title">
                <h5 style="font-size: 18px; color: var(--color-light-gray-ii)">and check me out on..</h5>
                <div class="contact-links">
                    <div class="contact-links-column">
                        <a class="contact-link" href="https://www.linkedin.com/in/daffamzulfikar/" target="_blank"><img src="/Assets/Icons/LinkedIn.svg" >LinkedIn</a>
                        <a class="contact-link" href="https://www.instagram.com/zurufikar/" target="_blank"><img src="/Assets/Icons/Instagram.svg">Instagram</a>
                    </div>
                    <div class="contact-links-column">
                        <a class="contact-link" href="https://github.com/zurthr" target="_blank"><img src="/Assets/Icons/GitHub.svg">GitHub</a>
                    </div>
                </div>
            </div>
            <div class="contact-head-title">
            <h5 style="font-size: 18px; color: var(--color-light-gray-ii)">Convince yourself further.</h5>
            <Whatsapp @form-toggled="handleWhatsAppFormToggle" />
            </div>
        </div>
        
    </div>
</template>

<style scoped>
.contact-container {
    display: flex;
    flex-direction: column;
    gap: 16px;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.contact-container.expanded-layout {
    flex-direction: row;
    align-items: flex-start;
    gap: 32px;
    max-width: 1200px;
    margin: 0 auto;
}

.contact-container.expanded-layout .contact-header {
    flex: 1;
    max-width: 500px;
}

.contact-container.expanded-layout .whatsapp-contact-form {
    flex: 1;
    max-width: 600px;
}

.contact-header {
    display: grid;
    width:96%;
    grid-template-columns: 1fr 1fr 1fr;
    align-items: flex-start;
    justify-content: space-between;
}
.contact-head-title {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 8px;
}
.contact-links {
    display: flex;
    flex-direction: row;
    gap: 16px;
    width: fit-content;
    align-items: flex-start;
    justify-content: center;
}

.contact-links-column {
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: flex-start;
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

/* Responsive design for contact layout */
@media (max-width: 768px) {
    .contact-container.expanded-layout {
        flex-direction: column;
        align-items: center;
        gap: 24px;
    }
    
    .contact-container.expanded-layout .contact-header,
    .contact-container.expanded-layout .whatsapp-contact-form {
        max-width: 100%;
    }
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

.carousel-section {
    width: 100%;
    margin-top: 24px;
    margin-bottom: 48px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
}

.carousel-title {
    font-family: 'VCR OSD Mono';
    font-size: 24px;
    color: var(--color-light-gray-ii);
    text-align: center;
    margin: 0;
}

/* Responsive carousel section */
@media (max-width: 768px) {
    .carousel-section {
        margin-top: 32px;
        gap: 16px;
    }
    
    .carousel-title {
        font-size: 20px;
    }
}
</style>

