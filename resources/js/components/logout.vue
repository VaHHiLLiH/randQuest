<template>
    <p>{{ name }}</p>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        name: {
            type: String,
            require: true,
        }
    }
}
</script>

<style scoped>

</style>
