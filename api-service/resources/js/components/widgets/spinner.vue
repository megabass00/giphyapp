<template>
    <div id="ajax-loader-'+ uniqueId +'" class="static-loader"></div>
</template>

<style>
    .ldBar {
        position: relative;
    }

    .ldBar.label-center > .ldBar-label {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-shadow: 0 0 3px #fff
    }

    .ldBar-label:after {
        content: "%";
        display: inline
    }

    .ldBar.no-percent .ldBar-label:after {
        content: ""
    }
</style>
