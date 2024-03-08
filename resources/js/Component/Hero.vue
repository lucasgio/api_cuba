<template>

    <section
        class="w-full py-32 md:py-64 lg:py-96 flex flex-col items-center justify-center text-center bg-gradient-to-r from-gray-800 via-black to-gray-800"
        id="eyebwr0sgef">
        <h1 class="text-4xl md:text-6xl lg:text-8xl font-bold tracking-tighter text-white">
            API CUBA
        </h1>
        <p class="mt-4 max-w-2xl text-lg md:text-2xl lg:text-3xl text-gray-300">
            Información de Cuba mas fácil y a mano.
        </p>
        <a  :href="link"
            class="mt-8 px-6 py-3 bg-blue-600 text-white rounded-lg text-lg font-medium hover:bg-blue-700 transition duration-300">Documentación</a>
    </section>

</template>

<script>
export default {
    name: "Hero",
    props: {
        link: {
            type: String,
            required: true
        }
    },
}
</script>

