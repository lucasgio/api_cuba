<template>
    <div>
        <Hero :link="link"/>
<!--        <Stats :information="{count,provinces,municipalities}"/>-->
    </div>
</template>

<script>
import Hero from "../Component/Hero";
import Stats from "../Component/Stats";

export default {
    name: "Home",
    components: {Stats, Hero},
    props:{
        count:Number,
        provinces:Number,
        municipalities:Number,
        link:String
    },
}
</script>


