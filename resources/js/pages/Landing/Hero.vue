<template>
    <div class="hero"> 
        <div class="hero-content">
            <!-- Left Section -->
            <div class="hero-left">
                <div class="intro-text">
                    <h2>Hey, I'm <span class="name">Zur!</span></h2>
                    <h3>
                        I build wonders in Minecraft,<br>
                        though my main craft lies in
                    </h3>
                    <h1>REAL LIFE<br>SOLUTIONS</h1>
                    <h4>'Inciting genius in the craft,<br>my craft.'</h4>
                </div>
                
                <!-- Social Icons -->
                <div class="social-links">
                    <div class="socials"><h4>.socials</h4></div>
                    <div class="social-icons">
                        <a href="#"><img src="/Assets/Icons/Linkedin.svg"></img></a>
                        <a href="#"><img src="/Assets/Icons/Github.svg"></img></a>
                        <a href="#"><img src="/Assets/Icons/Instagram.svg"></img></a>
                        <a href="#"><img src="/Assets/Icons/Bluesky.svg"></img></a>
                    </div>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="hero-right">
                <div class="featured-container">
                    <img src="/Assets/Icons/Book.svg"></img>
                    <h3>Create Things</h3>
                    <p>with Zur</p>
                </div>
                
                
                <!-- Build Section -->
                <div class="build-section">
                    <div class="build-container">
                        <h3 style="text-align: right;">Are you ready to</h3>
                        <h2 style="text-align: right; font-size:48px">BUILD</h2>
                        <h4 style="text-align: right;">your ideas? /~</h4>
                    </div>
                    <div class="featured-container two">
                        <img src="/Assets/Icons/Book.svg"></img>
                        <div>
                            <h3>Start Now</h3>
                            <p>Contact</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-bottom">
            <div class="hero-bottom-left">
                <h3>Trusted by Industry Professionals</h3>
                <div class="marquee-container">
                    <div class="marquee-content">
                        <!-- First rotation -->
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon1.svg" alt="Company 1">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon2.svg" alt="Company 2">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon3.svg" alt="Company 3">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon4.svg" alt="Company 4">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon5.svg" alt="Company 5">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon6.svg" alt="Company 6">
                        </div>
                        <!-- Second rotation (duplicate for seamless loop) -->
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon1.svg" alt="Company 1">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon2.svg" alt="Company 2">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon3.svg" alt="Company 3">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon4.svg" alt="Company 4">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon5.svg" alt="Company 5">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/MarqueeIcon6.svg" alt="Company 6">
                        </div>
                    </div>
                </div>
                <h5>to partake in their <u>grand designs</u>.</h5>
            </div>
            <div class="hero-bottom-right">
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<style scoped>
.hero {
    padding:0 92px;
    width: 100vw;
    height: 85vh;
    max-height: 1280px;
    flex-shrink: 0;
    background: linear-gradient(180deg, rgba(7, 14, 43, 0.20) 0%, rgba(57, 60, 63, 0.20) 85.52%, #393C3F 100%), linear-gradient(rgba(57, 60, 63, 0.8), rgba(57, 60, 63, 0.8)), url('/Assets/Images/Planetary.gif') center/cover no-repeat;
    position: relative;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
}

.hero-content {
    padding-top: 100px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    gap:20px;
    max-width: 1440px;
}

.hero-left {
    flex: 1;
    max-width: 500px;
    display: flex;
    flex-direction: column;
    gap:auto;
    justify-content: space-between;
    height: 600px;
}

.socials{
    display: flex;
width: 114px;
height: 23px;
justify-content: center;
align-items: center;
gap: 10px;
background: var(--Dark-Gray-I, #27292A);
}

.social-icons{
    display: flex;
    gap: 8px;
    margin-top: 12px;
}

.hero-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    max-width: 760px;
}

.featured-container {
    display: flex;
    height: 380px;
    padding: 16px;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    gap: 8px;
    align-self: stretch;
    border-radius: 12px;
background: linear-gradient(0deg, rgba(57, 60, 63, 0.26) 0%, rgba(57, 60, 63, 0.26) 100%), url('/Assets/Images/FeaturedPlaceholder.gif') lightgray 50% / cover no-repeat;
}

.featured-container.two {
    justify-content: flex-start;
    flex-direction: row;
    max-width: 480px;
    width: 50%;
    max-height: 180px;
    background: linear-gradient(0deg, rgba(57, 60, 63, 0.26) 0%, rgba(57, 60, 63, 0.26) 100%), url('/Assets/Images/Featured2Placeholder.gif') lightgray 50% / cover no-repeat;
}

.build-section {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-end;
    gap: 24px;
    height: 30%;
    width: 100%;
}

.build-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-end;
    gap: 4px;
    width: 50%;
}

.name {
color: #90B6D0;
font-family: "Mineglyph Faithful";
font-size: 40px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

h1 {
    color: #DAE3B1;
font-family: "Mineglyph Faithful";
font-size: 64px;
font-style: normal;
font-weight: 400;
line-height: 80px;}

h2, h3 {
    color:white;
    font-weight: 400;
}

h4 {
    color: var(--Light-Gray-I, #989DA2);
font-family: "VCR OSD Mono";
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

h5 {
    color: var(--Light-Gray-I, #989DA2);
    font-family: "VCR OSD Mono";
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin: 0;
}

p {
    color: var(--Light-Gray-I, #CECECE);
font-family: "Inter";
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
margin: 0;
}

.hero-bottom {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: space-between;
    width: 100%;
    height: 160px;
}

.marquee-container {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    margin: 16px 0;
    height: 60px;
    display: flex;
    align-items: center;
}

.marquee-content {
    display: flex;
    animation: marquee 20s linear infinite;
    gap: 40px;
}

.marquee-item {
    flex-shrink: 0;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.marquee-item img {
    height: 40px;
    width: auto;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: filter 0.3s ease;
}

.marquee-item img:hover {
    filter: grayscale(0%) opacity(1);
}
@keyframes marquee {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-50%);
    }
}
</style>