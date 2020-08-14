<template>
    <v-app class="default">
        <navigation />
        <v-main>
            <router-view></router-view>
        </v-main>

        <!-- <v-footer :inset="footer.inset" app>
            <span class="px-4">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer> -->
    </v-app>
</template>

<script>
import Navigation from "../pages/Navigation.vue";
export default {
    components: { Navigation }
};
</script>
