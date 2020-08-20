<template>
  <div class="restaurant mt-10">
    <!-- <template v-slot:top> -->
    <v-toolbar flat color="white">
      <v-toolbar-title>Restaurants</v-toolbar-title>
      <v-divider class="mx-4" inset vertical></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Add Users</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container wrap>
              <ValidationObserver ref="observer">
                <v-form>
                  <v-row>
                    <v-col cols="12" sm="12" md="12">
                      <ValidationProvider rules="required" v-slot="{ errors }" name="Name">
                        <v-text-field
                          v-model="editedItem.name"
                          :rules="rules"
                          :error-messages="errors"
                          hide-details="auto"
                          label="Full Name*"
                          required
                          hint="This is a required field"
                        ></v-text-field>
                      </ValidationProvider>
                    </v-col>
                    <v-col cols="12" sm="12" md="12">
                      <ValidationProvider
                        name="Restaurant Name"
                        v-slot="{ errors }"
                        rules="required"
                      >
                        <v-text-field
                          v-model="
                                                        editedItem.restaurant_name
                                                    "
                          :error-messages="errors"
                          label="Restaurants Name*"
                          hint="This is a required field"
                          prepend-inner-icon="mdi-silverware-fork-knife"
                        ></v-text-field>
                      </ValidationProvider>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <ValidationProvider
                        name="Phone Number"
                        v-slot="{ errors }"
                        rules="required|max:11"
                      >
                        <v-text-field
                          v-model="editedItem.phone"
                          label="Phone Number*"
                          :error-messages="errors"
                          :counter="11"
                          hint="This is a required field"
                          required
                          prepend-inner-icon="mdi-phone"
                        ></v-text-field>
                      </ValidationProvider>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-autocomplete
                        v-model="editedItem.role"
                        :items="['Admin', 'User']"
                        label="User Type"
                        prepend-inner-icon="mdi-account"
                      ></v-autocomplete>
                    </v-col>
                    <v-col cols="12">
                      <ValidationProvider v-slot="{ errors }" name="email" rules="required|email">
                        <v-text-field
                          v-model="editedItem.email"
                          label="Email*"
                          :error-messages="errors"
                          hint="This is a required field"
                          required
                          prepend-inner-icon="mdi-at"
                        ></v-text-field>
                      </ValidationProvider>
                    </v-col>
                    <v-col cols="12">
                      <ValidationProvider name="Password" v-slot="{ errors }" rules="required">
                        <v-text-field
                          v-model="
                                                        editedItem.password
                                                    "
                          label="Password*"
                          :error-messages="errors"
                          type="password"
                          required
                          prepend-inner-icon="mdi-lock"
                        ></v-text-field>
                      </ValidationProvider>
                    </v-col>
                    <v-col cols="12" sm="12">
                      <ValidationProvider
                        rules="required"
                        v-slot="{ errors }"
                        name="Restaurants Location"
                      >
                        <v-autocomplete
                          v-model="
                                                        editedItem.location
                                                    "
                          :items="[
                                                        'Abuja',
                                                        'Lagos',
                                                        'Enugu',
                                                        'Port Harcourt'
                                                    ]"
                          :error-messages="errors"
                          label="Restaurants Location *"
                          hint="This is a required field"
                          prepend-inner-icon="mdi-map-marker"
                        ></v-autocomplete>
                      </ValidationProvider>
                    </v-col>
                  </v-row>
                </v-form>
              </ValidationObserver>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
            <v-btn color="blue darken-1" text @click="save">Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <!-- </template> -->
    <v-data-table :headers="headers" :items="tableData" class="elevation-1 ma-5">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.restaurants_name }}</td>
        <td class="text-xs-right">{{ props.item.email }}</td>
        <td class="text-xs-right">{{ props.item.location }}</td>
        <td class="text-xs-right">{{ props.item.phone }}</td>
        <td class="text-xs-right">{{ props.item.role }}</td>
        <td class="text-xs-right">{{ props.item.created_at }}</td>
        <td class="justify-center layout px-0">
          <v-icon small class="mr-2" @click="editItem(props.item)">mdi-pencil</v-icon>
          <v-icon small @click="deleteItem(props.item)">mdi-delete</v-icon>
        </td>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import Popup from "../pages/Popup.vue";
import { required, email, max } from "vee-validate/dist/rules";
import {
  extend,
  ValidationObserver,
  ValidationProvider,
  setInteractionMode,
} from "vee-validate";

setInteractionMode("eager");

extend("required", {
  ...required,
  message: "{_field_} is a required field",
});

extend("max", {
  ...max,
  message: "{_field_} may not be greater than {length} characters",
});

extend("email", {
  ...email,
  message: "Email must be valid",
});
export default {
  name: "restaurant",
  components: { Popup, ValidationProvider, ValidationObserver },
  data: () => ({
    rules: [
      (value) => !!value || "Required.",
      (value) => (value && value.length >= 6) || "Min 6 characters",
    ],
    dialog: false,
    headers: [
      {
        text: "ID",
        align: "start",
        sortable: false,
        value: "id",
      },
      { text: "Name", value: "name" },
      { text: "Restaurants Name", value: "restaurant_name" },
      { text: "Email", value: "email" },
      { text: "Location", value: "location" },
      { text: "Phone Number", value: "phone" },
      { text: "Role", value: "role" },
      { text: "Date Created", value: "created_at" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    tableData: [],
    editedIndex: -1,
    allRoles: [],
    allPermission: [],
    editedItem: {
      id: "",
      name: "",
      restaurant_name: "",
      email: "",
      location: "",
      phone: "",
      role: "",
      created_at: "",
    },
    defaultItem: {
      id: "",
      name: "",
      restaurant_name: "",
      email: "",
      location: "",
      phone: "",
      role: "",
      created_at: "",
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Add Users" : "Edit Users";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    initialize() {
      axios.get("/api/users").then((response) => {
        this.tableData = response.data.data;
      });

      //   axios
      //     .get("/api/roles")
      //     .then((response) => (this.allRoles = response.data.data));
      //   axios
      //     .get("/api/permissions")
      //     .then((response) => (this.allPermissions = response.data.data));
    },

    editItem(item) {
      this.editedIndex = this.tableData.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      const index = this.tableData.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.tableData.splice(index, 1);
      axios
        .delete("/api/users/" + item.id)
        .then((response) => console.log(response.data));
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },

    save() {
      this.$refs.observer.validate();
      if (this.editedIndex > -1) {
        Object.assign(this.tableData[this.editedIndex], this.editedItem);
        axios
          .put("/api/users/" + this.editedItem.id, this.editedItem)
          .then((response) => console.log(response.data));
      } else {
        this.tableData.push(this.editedItem);
        axios
          .post("/api/users/", this.editedItem)
          .then((response) => console.log(response.data));
      }
      this.close();
    },
  },
};
</script>
