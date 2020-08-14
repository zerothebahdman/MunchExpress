<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on, attrs }">
                <v-btn color="primary" dark v-bind="attrs" v-on="on">
                    <span><v-icon>add</v-icon></span>
                    <span>Add Restaurant Owner</span>
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <span class="headline">Add Restaurant</span>
                    <v-spacer></v-spacer>
                    <span
                        ><v-icon
                            color="black darken-4"
                            dark
                            @click="dialog = false"
                            >mdi-close</v-icon
                        ></span
                    >
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Owners name*"
                                    required
                                    hint="This is a required field"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Restaurants Name*"
                                    hint="This is a required field"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Email*"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Password*"
                                    type="password"
                                    required
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12">
                                <v-autocomplete
                                    :items="[
                                        'Abuja',
                                        'Lagos',
                                        'Enugu',
                                        'Port Harcourt'
                                    ]"
                                    label="Restaurants Location"
                                ></v-autocomplete>
                            </v-col>
                        </v-row>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-4" dark>Create</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
export default {
    data: () => ({
        dialog: false
    })
};
</script>
