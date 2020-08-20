<template>
  <div class="restaurant-menus">
    <v-card class="ma-5" flat>
      <v-container>
        <v-row>
          <v-col cols="12" sm="12" md="6">
            <v-card>
              <v-img src="../img/gbegiri.jpg" height="250px" class="white--text align-end">
                <v-card-title>GBEGIRI + AMALA</v-card-title>
              </v-img>

              <v-card-title>GBEGIRI + AMALA</v-card-title>

              <v-card-subtitle class="font-weight-bold">Price: &#8358; 3500</v-card-subtitle>

              <v-card-actions>
                <v-btn color="purple" text>Edit</v-btn>
                <v-btn text color="red">Delete</v-btn>

                <v-spacer></v-spacer>
                <v-btn @click="display = !display" flat text>
                  Description
                  <v-icon>{{ display ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                </v-btn>
              </v-card-actions>

              <v-expand-transition>
                <div v-show="display">
                  <v-divider></v-divider>

                  <v-card-text>
                    <h6 class="font-weight-bold">Menu Description:</h6>Gbegiri is a traditional Nigerian bean soup consisting of honey beans (also called brown beans), smoked or fresh fish, ground crayfish, palm oil, stock, irú (locust beans), salt, and pepper. The beans are soaked, peeled, and mashed to a smooth paste, which is then combined with the other ingredients and cooked until the mixture reaches a slightly thickened consistency.
                  </v-card-text>
                </div>
              </v-expand-transition>
            </v-card>
          </v-col>

          <v-col cols="12" sm="12" md="6">
            <v-card>
              <v-img src="../img/bangasoup.jpg" height="250px" class="white--text align-end">
                <v-card-title>BANGA SOUP + FUFU</v-card-title>
              </v-img>

              <v-card-title>Vegetable Soup + FUFU</v-card-title>

              <v-card-subtitle class="font-weight-bold">Price: &#8358; 3000</v-card-subtitle>

              <v-card-actions>
                <v-btn color="purple" text>Edit</v-btn>
                <v-btn text color="red">Delete</v-btn>

                <v-spacer></v-spacer>
                <v-btn @click="show = !show" flat text>
                  Description
                  <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                </v-btn>
              </v-card-actions>

              <v-expand-transition>
                <div v-show="show">
                  <v-divider></v-divider>

                  <v-card-text>
                    <h6 class="font-weight-bold">Menu Description:</h6>Banga or ofe akwu is a flavorful Nigerian soup made with palm fruit, beef or dried fish, vegetables, and seasonings such as salt and chili pepper. The soup is traditionally paired with various fufu dishes. The name of the dish is derived from two words: ofe, meaning soup or stew, and akwu, meaning palm fruit.
                  </v-card-text>
                </div>
              </v-expand-transition>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    show: false,
    display: false,
  }),
};
</script>
