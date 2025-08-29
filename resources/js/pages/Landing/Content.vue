<script setup>
import ListOfContent from './ListOfContent.vue';
</script>

<template>
    <div class="content-section">
        <ListOfContent />
        <div>
            <div class="title-container">
                <div class="content-title">
                    <h2>A highlight of my proudest</h2>
                    <h1>CREATIONS</h1>
                </div>
                <div class="content-description">
                    <h3>Peer into my beloved craft</h3>
                    <h4>A product of ever-burning coffee addiction and Ylang Ylang tea.</h4>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</template>

<style scoped>
.title-container{
    display: flex;
    flex-direction: row;
    gap: auto;
    width: 100%;
}

.content-title{
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: -4px;
}

.content-description{
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
    padding: 30px 92px 30px 92px;
    gap: 30px;
    flex-shrink: 0;
    width: 100vw;
    max-width: calc(1440px + 184px);
    align-self: center;
    justify-self: center;
}
</style>