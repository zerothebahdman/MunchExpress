<template>
    <nav>
        <v-navigation-drawer
            v-model="primaryDrawer.model"
            :clipped="primaryDrawer.clipped"
            app
            overflow
            style="width: 17.5rem;"
        >
            <v-list class="mr-3">
                <v-list-item
                    link
                    v-for="link in navDrawerLinks"
                    :key="link.name"
                    router
                    :to="link.route"
                    class="mb-3"
                >
                    <v-list-item-icon>
                        <v-icon>{{ link.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ link.name }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-group prepend-icon="mdi-account" no-action>
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title
                                >User Management</v-list-item-title
                            >
                        </v-list-item-content>
                    </template>
                    <v-list-item to="/admin/restaurants" class="mt-2">
                        <v-list-item-icon>
                            <v-icon>supervisor_account</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>
                                Users
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar :clipped-left="primaryDrawer.clipped" app flat>
            <v-toolbar flat class="transparent">
                <v-app-bar-nav-icon
                    v-if="primaryDrawer.type !== 'permanent'"
                    @click.stop="primaryDrawer.model = !primaryDrawer.model"
                ></v-app-bar-nav-icon>
                <v-toolbar-title>Munch Express</v-toolbar-title>
                <v-spacer></v-spacer>
                <!-- <v-col cols="3" sm="2">
                    <v-text-field
                        class="mt-5"
                        label="Search"
                        append-icon="mdi-magnify"
                    ></v-text-field>
                </v-col> -->

                <v-btn icon>
                    <v-icon>mdi-bell</v-icon>
                </v-btn>

                <span>
                    <v-btn icon>
                        <v-icon>mdi-account</v-icon>
                    </v-btn>
                </span>
                <span>Admin</span>
            </v-toolbar>
        </v-app-bar>
    </nav>
</template>

<script>
export default {
    data: () => ({
        drawers: ["Default (no property)"],
        navDrawerLinks: [
            {
                icon: "dashboard",
                name: "Dashboard",
                route: "/admin/dashboard"
            },
            // {
            //     icon: "mdi-account",
            //     name: "Restaurants",
            //     route: "/admin/restaurants"
            // },
            {
                icon: "mdi-food",
                name: "Restuarant Menus",
                route: "/user/menus"
            }
        ],
        primaryDrawer: {
            model: null,
            type: "default (no property)",
            clipped: false,
            floating: false,
            mini: false
        },
        methods: {},
        footer: {
            inset: true
        }
    })
};
</script>
