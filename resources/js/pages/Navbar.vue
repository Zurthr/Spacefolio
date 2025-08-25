<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <nav class="navbar">
    <!-- Left Border Decoration -->
    <div class="navbar-border-1"></div>
    
    <div class="navbar-container">
      <!-- Logo -->
      <div style='height:56px; padding:4px 0;' class="glass">
        <Link style='height:56px;' href="/" class="logo-link"><img style='height:48px' src="/Assets/ZurLogo.png" alt="Logo"></img></Link>
      </div>

      <!-- Navigation Links -->
      <div class="navbar-nav glass">
        <Link href="/me" class="nav-item "><h3 class="shadow">&lt;EXPERTISE&gt;</h3></Link>
        <Link href="/creations" class="nav-item"><h3 class="shadow">&lt;CREATIONS&gt;</h3></Link>
        <Link href="/experiences" class="nav-item"><h3 class="shadow">&lt;EXPERIENCES&gt;</h3></Link>
      </div>

      <!-- Contact Button -->
      <div class="navbar-contact glass">
        <Link href="/contact" class="contact-btn">[CONTACT]</Link>
      </div>
    </div>
    
    <!-- Right Border Decoration -->
    <div class="navbar-border-right"></div>
    <div class="navbar-border-1"></div>
  </nav>
</template>

<style scoped>
.navbar {
    display: flex;
  position: fixed;
  height:60px;
  top: 10px;
  left: 5vw;
  right: 5vw;
  z-index: 1000;
}

.navbar-nav {
  display: flex;
  text-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.25);
  gap: 16px;
  justify-content: center;
  align-items: center;
}

.navbar-container {
  margin: 0 auto;
  height:64px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-8);
  padding: 0 1%;
  width:98%;
  background: #ffffff1a;;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
    height:100%;
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
  width: 0.70%;
  height: 90%;
  align-self: center;
  justify-self: center;
  background: #ffffff1a;;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8.3px);
    -webkit-backdrop-filter: blur(8.3px);
  padding: 0;
  border-radius: 0.5%;
}


</style>
