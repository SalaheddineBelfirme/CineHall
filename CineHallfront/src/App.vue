<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <header>
   

    <nav class="nav">
        <RouterLink class="nav-link" to="/"><img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="100" height="100" /></RouterLink>
        <RouterLink class="nav-link" to="/about">About</RouterLink>
        <RouterLink class="nav-link" to="/login">Login</RouterLink>
        <RouterLink class="nav-link" to="/register">Register</RouterLink>
      </nav>
  </header>

  <RouterView />
</template>

<style scoped>


</style>
