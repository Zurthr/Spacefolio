<template>
    <div class="chat">
        <h3>Hear that..?</h3>
        <div class="chat-container">
            <div v-if="testimonials.length" class="chat-item" :style="{
                opacity: chatItemVisible ? 1 : 0,
            }">
            <div class="personel-container">
                <div class="personel">
                    <img :src="currentTestimonial.personImage" :alt="currentTestimonial.personName" />
                    <img style="transform: translateX(-15px);" :src="currentTestimonial.companyImage" :alt="currentTestimonial.company" />
                </div>
                <div class="personel-content">
                    <h5>{{ currentTestimonial.title }}</h5>
                    <h5>@ {{ currentTestimonial.company }}</h5>
                </div>
            </div>
                <div class="text">
                    <p>{{ currentTestimonial.message }}</p>
                </div>
            </div>
            
            <!-- Typing indicator -->
            <div class="typing-container">
                <div class="mail" @click="nextTestimonial">
                <img style='height:20px; cursor: pointer;' src="/Assets/Chat/Mail.svg" alt="Mail" />
            </div>
            <div class="typing-indicator" :style="{ 
                opacity: showTyping ? 1 : 0,
                transform: showTyping ? 'translateX(8px)' : 'translateX(0px)'
            }">
                <div class="typing-bubble">
                    <span>Someone is typing</span>
                    <div class="typing-dots">
                        <span class="dot-1"></span>
                        <span class="dot-2"></span>
                        <span class="dot-3"></span>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</template>

<style scoped>
.chat {
    display: flex;
    flex-direction: column;
    gap: 16px;
    width: 200px;
}

.chat-container {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.chat-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
    transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
}

.personel {
    display: flex;
    flex-direction: row;
    width:60px;
}

.personel-container {
    display: flex;
    flex-direction: row;
    gap: 8px;
    width:240px;
    height:40px;
    align-items: center;
    justify-content: left;
}

.personel-content {
    display: flex;
    flex-direction: column;
    width:160px;
   justify-content: left;
}

.personel img {
    height: 40px;
}

.text{
    display: flex;
    flex-direction: column;
    padding: 8px;
    width: 200px;
    background-color: var(--color-light-gray-ii);
    border-radius: 8px;
    height:160px;
}

.typing-container {
    display: flex;
    flex-direction: row;
    gap: 4px;
}


.typing-indicator {
    transition: opacity 0.3s ease-in-out, transform 0.8s ease-in-out;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
}

.typing-bubble {
    display: flex;
    align-items: center;
    gap: 8px;
    max-width: fit-content;
    font-size: 14px;
    color: var(--color-light-gray-ii);
}

.typing-dots {
    display: flex;
    gap: 3px;
}

.typing-dots span {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background-color: #999;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-dots .dot-1 {
    animation-delay: 0s;
}

.typing-dots .dot-2 {
    animation-delay: 0.2s;
}

.typing-dots .dot-3 {
    animation-delay: 0.4s;
}

span {
    font-family: 'VCR OSD Mono';
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
        opacity: 0.4;
    }
    30% {
        transform: translateY(-8px);
        opacity: 1;
    }
}

h5{
    color: var(--color-light-gray-ii);
    font-size: 16px;
}

h3 {
    font-size: 22px;
}

p {
    font-size: 18px;
    color: var(--color-main-gray);
    font-family: 'VCR OSD Mono';
}

</style>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'

const currentIndex = ref(0)
const showTyping = ref(false)

const chatItemVisible = ref(false)
let intervalId: number | null = null
let typingTimeoutId: number | null = null

type RecommendationApi = {
    id: number,
    person_image: string,
    company_image: string,
    person_name: string,
    title: string,
    company: string,
    message: string
}

type RecommendationView = {
    id: number,
    personImage: string,
    companyImage: string,
    personName: string,
    title: string,
    company: string,
    message: string
}

const testimonials = ref<RecommendationView[]>([])

const currentTestimonial = computed(() => testimonials.value[currentIndex.value])

const nextTestimonial = () => {
    showTyping.value = false
    chatItemVisible.value = false
    
    if (intervalId) {
        clearInterval(intervalId)
    }
    
    setTimeout(() => {
        currentIndex.value = (currentIndex.value + 1) % testimonials.value.length
        chatItemVisible.value = true
        scheduleTypingIndicator()
        
        startAutoRotate()
    }, 400)
}

const scheduleTypingIndicator = () => {
    if (typingTimeoutId) {
        clearTimeout(typingTimeoutId)
    }
    
    // Show typing indicator after 4 seconds
    typingTimeoutId = setTimeout(() => {
        showTyping.value = true
    }, 4000)
}



const startAutoRotate = () => {
    intervalId = setInterval(nextTestimonial, 8000) // 8 sec
}

onMounted(async () => {
    setTimeout(() => {
        chatItemVisible.value = true
    }, 50)

    try {
        const res = await fetch('/api/recommendations')
        if (res.ok) {
            const data: RecommendationApi[] = await res.json()
            testimonials.value = data.map((d) => ({
                id: d.id,
                personImage: d.person_image,
                companyImage: d.company_image,
                personName: d.person_name,
                title: d.title,
                company: d.company,
                message: d.message,
            }))
        }
    } catch (e) {
    }

    if (testimonials.value.length === 0) {
        return
    }

    startAutoRotate()
    scheduleTypingIndicator()
})

onUnmounted(() => {
    if (intervalId) {
        clearInterval(intervalId)
    }
    if (typingTimeoutId) {
        clearTimeout(typingTimeoutId)
    }
})
</script>