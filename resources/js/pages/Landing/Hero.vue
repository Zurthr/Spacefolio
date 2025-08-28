<template>
    <div class="hero"> 
        <div class="hero-content">
            <!-- Left Section -->
            <div class="hero-left">
                <div class="intro-text">
                    <div>
                        <h2>Hey, I'm <span class="name">Zur!</span></h2>
                        <h3>
                            I build wonders in Minecraft,<br>
                            though my main craft lies in
                        </h3>
                        <h1>REAL LIFE<br>SOLUTIONS</h1>
                    </div>
                        <div class="intro-text"> 
                        <h3><span style="color: var(--color-light-gray-ii);">Based in</span> Jakarta, Indonesia</h3>
                    </div>
                    <HeroSkillCard />
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
                        <h2 style="text-align: right; font-size:48px"><img src="/Assets/Icons/Books.svg" style="height:40px; margin-right:8px"></img>BUILD</h2>
                        <h4 style="text-align: right;">your ideas? /~</h4>
                    </div>
                    <div class="featured-container two">
                        <img style='height:52px'src="/Assets/Icons/Quill.svg"></img>
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
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/IISMA.svg" alt="IISMA">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/IISMASG.svg" alt="IISMA SG">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/Archipel.svg" alt="Archipel">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/Bi.svg" alt="Bi">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/Cybersec.svg" alt="Cybersec">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/AIESECNTU.svg" alt="AIESEC NTU">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/AIESECBdg.svg" alt="AIESEC Bandung">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/EDM.svg" alt="EDM">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/DASPRO.svg" alt="DASPRO">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/SES.svg" alt="SES">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/IISMA.svg" alt="IISMA">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/IISMASG.svg" alt="IISMA SG">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/Archipel.svg" alt="Archipel">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/BiBlue.svg" alt="BiBlue">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/Cybersec.svg" alt="Cybersec">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/AIESECNTU.svg" alt="AIESEC NTU">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/AIESECBdg.svg" alt="AIESEC Bandung">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/EDM.svg" alt="EDM">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/DASPRO.svg" alt="DASPRO">
                        </div>
                        <div class="marquee-item">
                            <img src="/Assets/Icons/Marquee/SES.svg" alt="SES">
                        </div>
                    </div>
                </div>
                <h5>to partake in their <u>grand designs</u>.</h5>
            </div>
            <div class="hero-bottom-right">
                <img src="/Assets/Images/BottomRight.svg"></img>
                <h5 style="color: #CCD3D9;">Be convinced. /~</h5>
                <div style="display: flex; gap:4px; background: #27292A; align-items: center; padding:0 2px;"><h5>.scroll-down</h5><img style="height:16px" src="/Assets/Icons/Arrow Down.svg"></img></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import HeroSkillCard from './HeroSkillCard.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<style scoped>
.hero {
    padding:0 92px;
    width: 100vw;
    height: 90vh;
    max-height: 1280px;
    flex-shrink: 0;
    background: linear-gradient(180deg, rgba(7, 14, 43, 0.20) 0%, rgba(57, 60, 63, 0.20) 85.52%, #393C3F 100%), linear-gradient(rgba(57, 60, 63, 0.8), rgba(57, 60, 63, 0.8)), url('/Assets/Images/Planetary.gif') center/cover no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
}

.hero-content {
    padding-top: 108px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    height: 95%;
    max-height: 800px;
    max-width: 1440px;
    gap: 64px;
    margin-bottom: 12px
}

.hero-left {
    flex: 1;
    max-width: 500px;
    display: flex;
    flex-direction: column;
    gap:auto;
    justify-content: space-between;
    height: 100%;
    max-height: 720px;
}

.hero-bottom-left {
    width: 45%;
    display: flex;
    flex-direction: column;
    gap: 4px;
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

.social-links {
    transition: opacity 0.3s ease;
}

@media (max-height: 900px) {
    .social-links {
        opacity: 0;
    }
}

.hero-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    max-width: 640px;
}

.featured-container {
    margin-top: 12px;
    display: flex;
    height: 320px;
    padding: 16px;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    gap: 4px;
    align-self: stretch;
    border-radius: 12px;
background: linear-gradient(0deg, rgba(57, 60, 63, 0.26) 0%, rgba(57, 60, 63, 0.26) 100%), url('/Assets/Images/FeaturedPlaceholder.gif') lightgray 50% / cover no-repeat;
}

.featured-container.two {
    justify-content: flex-start;
    flex-direction: row;
    max-width: 480px;
    width: 50%;
    gap:4px;
    max-height: 160px;
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

.hero-bottom-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-end;
    gap: 4px;
    height: 100%;
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
    height: 128px;
    max-width: 1440px;
}

.marquee-container {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    margin: 4px 0;
    height: 60px;
    display: flex;
    align-items: center;
}

.marquee-content {
    display: flex;
    animation: marquee 15s linear infinite;
    gap: 24px;
}

.marquee-item {
    flex-shrink: 0;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.marquee-item img {
    height: 56px;
    width: auto;
    object-fit: contain;
    filter: grayscale(100%) opacity(1);
    transition: filter 0.3s ease;
}

.marquee-item img:hover {
    filter: grayscale(0%) opacity(1);
}
@keyframes marquee {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(2*(-56px * 10 - 24px * 9 + 8px)));
    }
}

.intro-text {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
</style>