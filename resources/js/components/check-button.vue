<template>
    <div class="flex" style="position: relative;">
        <input type="checkbox" class="form__check-input" v-model="$parent.values[value]">
        <div class="btn form__check-button">
            <div class="flex">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["value"]
    }
</script>