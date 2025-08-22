<template>
    <div class="hero"> 
        <div class="hero-content">
            <!-- Left Section -->
            <div class="hero-left">
                <div class="intro-text">
                    <h1>Hey, I'm <span class="name">Zur!</span></h1>
                    <p>
                        I build wonders in Minecraft,<br>
                        though my main craft lies in
                    </p>
                    <h2>REAL LIFE<br>SOLUTIONS</h2>
                    <p>'Inciting genius in the craft,<br>my craft.'</p>
                </div>
                
                <!-- Social Icons -->
                <div class="social-links">
                    <span>socials</span>
                    <div class="social-icons">
                        <a href="#">in</a>
                        <a href="#">⚬</a>
                        <a href="#">📷</a>
                        <a href="#">✕</a>
                    </div>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="hero-right">
                <!-- Planet Image -->
                <div class="planet-container">
                    <div class="planet-image"></div>
                </div>
                
                <!-- Create Things Section -->
                <div class="create-section">
                    <div>📋</div>
                    <h3>create things</h3>
                    <p>with Zur</p>
                </div>
                
                <!-- Build Section -->
                <div class="build-section">
                    <h3>Are you ready to</h3>
                    <div class="build-main">
                        <span>⚒️</span>
                        <span>BUILD</span>
                        <span>🎯</span>
                        <span>start<br>now</span>
                    </div>
                    <p>your ideas? /~</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<style scoped>
.hero {
    padding: 120px 92px;
    width: 100vw;
    height: 1040px;
    flex-shrink: 0;
    background: linear-gradient(180deg, rgba(7, 14, 43, 0.20) 0%, rgba(57, 60, 63, 0.20) 85.52%, #393C3F 100%), linear-gradient(rgba(57, 60, 63, 0.8), rgba(57, 60, 63, 0.8)), url('/Assets/Images/Planetary.gif') center/cover no-repeat;
    position: relative;
    display: flex;
    align-items: center;
}

.hero-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.hero-left {
    flex: 1;
    max-width: 500px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 600px;
}

.hero-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2rem;
    max-width: 400px;
}

.planet-container {
    position: relative;
    width: 200px;
    height: 200px;
}

.planet-image {
    width: 100%;
    height: 100%;
    background: url('/Assets/Images/Planetary.gif') center/cover no-repeat;
    border-radius: 50%;
    filter: brightness(1.2) contrast(1.1);
}
</style>