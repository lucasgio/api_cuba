<template>
    <section class="text-white body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap justify-around -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2 border-2 rounded-lg hover:bg-white hover:text-indigo-500">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl">{{information.provinces}}</h2>
                    <p class="leading-relaxed">Provincias</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2 border-2 rounded-lg hover:bg-white hover:text-indigo-500">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl">{{information.municipalities}}</h2>
                    <p class="leading-relaxed">Municipios</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2 border-2 rounded-lg hover:bg-white hover:text-indigo-500">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl">{{information.count}}</h2>
                    <p class="leading-relaxed">Cantidad de visitantes</p>
                </div>
<!--                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl">4</h2>
                    <p class="leading-relaxed">Products</p>
                </div>-->
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Stats",
    props: ['information']
}
</script>

