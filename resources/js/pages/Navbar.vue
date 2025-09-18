<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref, watch, onMounted, onUnmounted } from 'vue';
import WorkInProgressModal from '../components/WorkInProgressModal.vue';

const page = usePage();
const isModalOpen = ref(false);
const isChatBottomVisible = ref(false);

// const workInProgressRoutes = ['/me', '/creations', '/experiences'];

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

// watch(() => page.url, (newUrl) => {
//     if (workInProgressRoutes.includes(newUrl)) {
//         isModalOpen.value = true;
//     } else {
//         isModalOpen.value = false;
//     }
// }, { immediate: true });


const scrollToSection = (section: 'hero'| 'key-creations' | 'other-projects' | 'experiences' | 'contact') => {
    let targetRef: HTMLElement | null = null;
    
    switch (section) {
        case 'key-creations':
            targetRef = document.querySelector('.key-content') as HTMLElement;
            break;
        case 'other-projects':
            targetRef = document.querySelector('.other-projects') as HTMLElement;
            break;
        case 'hero':
            targetRef = document.querySelector('.hero-content') as HTMLElement;
            break;
        case 'experiences':
            targetRef = document.querySelector('.experiences-container') as HTMLElement;
            break;
        case 'contact':
            targetRef = document.querySelector('.carousel-section') as HTMLElement;
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

const handleNavClick = (route: string, section?: 'hero'|'key-creations' | 'other-projects' | 'experiences' | 'contact') => {
    if (section) {
        if (page.url === '/') {
            scrollToSection(section);
        } else {
            router.visit('/', {
                onSuccess: () => {
                    setTimeout(() => {
                        scrollToSection(section);
                    }, 300);
                }
            });
        }
    } else {
        router.visit(route);
    }
};

const handleScroll = () => {
    const chatContainer = document.querySelector('.chat-container');
    if (chatContainer) {
        const rect = chatContainer.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        
        const isBottomVisible = rect.bottom <= windowHeight;
        isChatBottomVisible.value = isBottomVisible;
    }
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    // Initial check
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>

<template>
    <nav class="navbar">
        <div class="navbar-border-1"></div>

        <div class="navbar-container">
            <div style="height: 56px; cursor:pointer; padding: 4px 0"  @click="handleNavClick('/', 'hero')">
                <div style="height: 56px; background:none;"  class="logo-link"><img style="height: 48px" src="/Assets/ZurLogo.png" alt="Logo" /></div>
            </div>

            <!-- <div class="navbar-nav glass" :class="{ 'chat-visible': isChatBottomVisible }">
                <button @click="handleNavClick('/', 'key-creations')" class="nav-item creations-btn" :class="{ 'hiddens': isChatBottomVisible }"><h3 class="shadow">&lt;CREATIONS&gt;</h3></button>
                <button @click="openModal" class="nav-item blog-btn" :class="{ 'slid-left': isChatBottomVisible }"><h3 class="shadow" style="color: var(--color-light-gray-i);">&lt;BLOG&gt;</h3></button>
                <button @click="openModal" class="nav-item blog-btn" :class="{ 'slid-left': isChatBottomVisible }"><h3 class="shadow" style="color: var(--color-light-gray-i);">&lt;BLOG&gt;</h3></button>
                <button @click="handleNavClick('/', 'experiences')" class="nav-item experiences-btn" :class="{ 'hiddens': isChatBottomVisible }"><h3 class="shadow">&lt;EXPERIENCES&gt;</h3></button>               
            
            </div> -->

                
            <div class="navbar-nav glass" :class="{ 'chat-visible': isChatBottomVisible }">
                <button @click="handleNavClick('/', 'key-creations')" class="nav-item creations-btn" :class="{ 'hiddens': isChatBottomVisible }"><h3 class="shadow">&lt;CREATIONS&gt;</h3></button>
                <button @click="handleNavClick('/', 'experiences')" class="nav-item experiences-btn" :class="{ 'hiddens': isChatBottomVisible }"><h3 class="shadow">&lt;EXPERIENCES&gt;</h3></button>               
                <button @click="openModal" class="nav-item blog-btn" :class="{ 'slid-left': isChatBottomVisible }"><h3 class="shadow" style="color: var(--color-light-gray-i);">&lt;BLOG&gt;</h3></button>
                <button @click="handleNavClick('/', 'contact')" class="nav-item experiences-btn"><h3 class="shadow">&lt;CONTACT&gt;</h3></button>

            </div>
                
        </div>

        <div class="navbar-border-right"></div>
        <div class="navbar-border-1"></div>
    </nav>

    <WorkInProgressModal :isOpen="isModalOpen" @close="closeModal" />
</template>

<style scoped>
.navbar {
    display: flex;
    position: fixed;
    height: 60px;
    top: 10px;
    left: 5vw;
    right: 5vw;
    z-index: 1000;
}

.navbar-nav {
    display: flex;
    height:100%;
    /* width:center; */
    text-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.25);
    gap: 16px;
    justify-content: center;
    align-items: center;
}

.navbar-container {
    margin: 0 auto;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-8);
    padding: 0 1%;
    width: 98%;
    background: #ffffff1a;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    height: 100%;
    border-radius: 4%;
}

/* .glass{
    background: #ffffff1a;;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    height:100%;
} */

.shadow {
    text-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.25);
}

.navbar-border-1 {
    width: 0.7%;
    height: 90%;
    align-self: center;
    justify-self: center;
    background: #ffffff1a;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    padding: 0;
    border-radius: 0.5%;
}

.nav-item {
    background: none;
    border: none;
    color: inherit;
    font: inherit;
    cursor: pointer;
    text-decoration: none;
    padding: 0;
    margin: 0;
    height:100%;
    transition: all 0.3s ease;
}

.nav-item:hover {
    transform: scale(1.05);
    color: #fff;
}

a.nav-item {
    text-decoration: none;
}

button.nav-item {
    background: none;
    border: none;
}

.contact-btn {
    background: none;
    border: none;
    color: inherit;
    font: inherit;
    cursor: pointer;
    text-decoration: none;
    padding: 0;
    margin: 0;
    transition: all 0.3s ease;
}

.contact-btn:hover {
    transform: scale(1.05);
}

.navbar-nav {
    transition: all 0.5s ease-in-out;
}

.creations-btn, .experiences-btn {
    transition: appear 1s ease-in-out;
    opacity: 1;
} 

.creations-btn.hiddens, .experiences-btn.hiddens {
    transition: opacity 1s ease-in;
    opacity: 0;
    pointer-events: none;
}


.blog-btn {
    transition: transform 1s ease-in-out;
    transform: translateX(0px);
}

/* .blog-btn.slid-left {
    transform: translateX(-120px);
} */

.navbar-nav.chat-visible {
    justify-content: space-around  ;
    gap:20px;
}

.navbar-nav.chat-visible .blog-btn {
    margin-left: auto;
}

</style>
