<template>
    <div class="list-of-content">
        <div class="content-container">
            <h3>.zur &#123;</h3>
            <div class="content">
                <img src="/Assets/Icons/Meteor.svg" class="icon"></img>
                <span class="text">Key Creations;</span>
            </div>
            <div class="content">
                <img src="/Assets/Icons/Book.svg" class="icon"></img>
                <span class="text">Other Projects;</span>
            </div>
            <div class="content">
                <img src="/Assets/Icons/Heart.svg" class="icon"></img>
                <span class="text">Experiences;</span>
            </div>
            <div class="content">
                <img src="/Assets/Icons/Comment.svg" class="icon"></img>
                <span class="text">Contact;</span>
            </div>
            <h3>&#125;</h3>
        </div>
    </div>

</template>

<style scoped>
.list-of-content {
    position: sticky;
    top: 148px;
    display: flex;
    height: 668px;
    padding: 0;
    flex-direction: column;
    align-items: flex-start;
    gap: 40px;
    width: 240px;
}

.content-container{
    display: flex;
    gap:8px;
    flex-direction: column;
    width:240px;
}

.content{
    font-family: "VCR OSD Mono";
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    color: var(--color-light-gray-i);
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.content:hover{
    color: var(--color-light-gray-ii);
}

.icon {
    width: 20px;
    height: 20px;
    margin-right: 8px;
    opacity: 0;
    transform: translateX(-28px);
    transition: all 0.3s ease;
}

.text {
    transform: translateX(-28px);
    transition: transform 0.3s ease;
}

.content:hover .icon {
    opacity: 1;
    transform: translateX(0);
}

.content:hover .text {
    transform: translateX(0);
}
</style>