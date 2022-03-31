<template>
    <section class="text-white body-font font-ubuntu">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-extrabold">API CUBA
                    <br class="hidden lg:inline-block">Información para el dev cubano acerca de Cuba
                </h1>
                <p class="mb-8 font-medium leading-relaxed">
                    Proyecto open-source desarrollado en Laravel para ayudar al
                    desarrollador cubano.</p>

            </div>
            <div
                class="lg:max-w-lg skew-y-6 lg:w-full md:w-1/2 w-5/6
                       hover:-translate-y-6 hover:scale-125 hover:shadow-2xl duration-500
                       hover:rounded-lg"
            >
                <img class="object-cover object-center" alt="hero"
                     :src="require('../assets/hero-img.png').default">
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Hero",
}
</script>

