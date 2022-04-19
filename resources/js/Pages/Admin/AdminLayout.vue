<template>

    <!-- Including Navbar component -->
    <Header></Header>

    <!-- Flash messages -->
    <Flash></Flash>


    <!-- Main part of the page -->
    <article>
        <slot />
    </article>

</template>
<script>

import Header from './Partials/Header'

import Flash from './Partials/FlashMessage'


export default {
    components: {
        Header,
        Flash,
    },
}
</script>
