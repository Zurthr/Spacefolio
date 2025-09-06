<template>
    <div class="chat">
        <h3>Hear that..?</h3>
        <div class="chat-container">
            <div class="chat-item" :style="{
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

const testimonials = ref([
    {
        id: 1,
        personImage: "/Assets/Chat/Ijapi.svg",
        companyImage: "/Assets/Chat/tedxround.svg",
        personName: "Izzafi A.",
        title: "Data Eng.",
        company: "TedxTelkom",
        message: "..Versatile full-stack developer and adaptive leader who empowers his team and drives results. Highly self-driven.."
    },
    {
        id: 2,
        personImage: "/Assets/Chat/Zulfa.svg",
        companyImage: "/Assets/Chat/biround.png",
        personName: "Zulfa U.",
        title: "Sr. UI/UX Dev.",
        company: "Bank Indonesia",
        message: "..Adaptable engineer, quickly learned BI’s practices, consistently shipped amazing results. Sociable and dependable.."
    },
    {
        id: 3,
        personImage: "/Assets/Chat/Sheva.svg",
        companyImage: "/Assets/Chat/tedxround.svg",
        personName: "Sheva Z.A",
        title: "Content Lead",
        company: "TedxNTU",
        message: "..Empathetic leader, very communicative and empowers teams with diverse perspectives. Collaborative and growth-oriented.."
    }
])

const currentTestimonial = computed(() => testimonials.value[currentIndex.value])

const nextTestimonial = () => {
    showTyping.value = false
    chatItemVisible.value = false
    
    setTimeout(() => {
        currentIndex.value = (currentIndex.value + 1) % testimonials.value.length
        chatItemVisible.value = true
        scheduleTypingIndicator()
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

// Lifecycle hooks
onMounted(() => {
    setTimeout(() => {
        chatItemVisible.value = true
    }, 50)
    
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