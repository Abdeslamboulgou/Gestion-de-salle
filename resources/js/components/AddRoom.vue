<template>
  <!-- La page pour ajouter salle admin -->

  <div>
    <h3 >
      New room
    </h3>

    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addRoom">
          <div class="form-group">
            <div class="form-group">
              <label>OWNER</label>

              <select class="form-select" v-model="room.id_owner">
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <div class="form-group">
              <label>TYPE</label>

              <select class="form-select" v-model="room.type">
                <option>C02</option>
                <option>C03</option>
                <option>C04</option>
                <option>C05</option>
                <option>C06</option>
                <option>C07</option>
                <option>C08</option>
              </select>
            </div>
            <label>NAME</label>
            <input type="text" required class="form-control" v-model="room.name" />
          </div>

          <div class="form-group">
            <label>OPENING DATE</label>
            <input type="datetime-local" required class="form-control" v-model="room.openingDate" />
          </div>
          <div class="form-group">
            <label>CLOSING DATE</label>
            <input type="datetime-local" required class="form-control" v-model="room.closingDate" />
          </div>

          <br />
          <!-- switch pour suspended salle -->

          <div class="form-check form-switch" style="margin-left: -35px">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" v-model="room.suspension"
              checked />
            <label style="margin-left: 10px" class="form-check-label" for="flexSwitchCheckChecked">
              SUSPENSED</label>
          </div>

          <!-- Bouton valider l'ajout de salle -->

          <button class="btn-submit" type="submit" 
            >
            VALIDATE
          </button>
          <span id="message"></span>
        </form>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      room: {},
    };
  },

  methods: {
    addRoom() {
      axios
        .post("http://localhost:8000/api/room/store", this.room)
        .then((response) => {
          this.$router.push({ name: "home" });
          // window.alert("the room was added successfully  !");
        })
        .catch((error) => console.log("erroor", error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>