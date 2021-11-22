<template>
    <div class="p-6 text-2xl empty-state-container">
        <div style="text-align: center">
            <ui-icon :size="48" style="color: #9e9e9e" class="empty-icon">disabled_by_default</ui-icon>
        </div>
        <div class="animated shake" style="text-align: center; color: #424242">
            Nincsenek {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    name: "EmptyState",
    props: ['message']
}
</script>

<style scoped>
.empty-state-container {
    border-radius: 50%;
    background-color: rgba(255, 0, 0, 0.1);
    width: 300px;
    height: 300px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    margin: 25px;
    margin-left: auto;
    margin-right: auto;
}

.empty-icon {
    width: 100px;
    height: 100px;
    font-size: 100px;
}

@-webkit-keyframes shake {
    from, to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0);
    }

    20%, 40%, 60%, 80% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0);
    }
}

@keyframes shake {
    from, to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0);
    }

    20%, 40%, 60%, 80% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0);
    }
}

.shake {
    -webkit-animation-name: shake;
    animation-name: shake;
}

.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
</style>
