<template>
  <v-app>
    <dashboard-app-bar />

    <dashboard-drawer />

    <!-- <dashboard-core-view /> -->

    <!-- <dashboard-core-settings /> -->
  </v-app>
</template>

<script>
export default {
  name: "DashboardIndex",

  components: {
    DashboardAppBar: () => import("./components/AppBar"),
    DashboardDrawer: () => import("./components/Drawer"),
    // DashboardCoreSettings: () => import("./components/Settings"),
    // DashboardCoreView: () => import("./components/View"),
  },

  data: () => ({
    expandOnHover: false,
  }),
};
</script>
