<template>
    <section class="text-white">
        <div class="container h-96 mx-auto flex px-5 py-24 md:flex-row flex-col items-center opacity-75 mb-10">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font lg:text-6xl mb-4 font-extrabold">API CUBA
                </h1>
                <p class="mb-8 font-medium leading-relaxed">
                    Proyecto de código abierto desarrollado en Laravel para apoyar a los desarrolladores en Cuba.</p>

            </div>
            <div
                class="lg:max-w-lg skew-y-6 lg:w-full md:w-1/2 w-5/6"
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

