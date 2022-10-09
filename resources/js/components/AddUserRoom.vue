<template>

<!-- La page pour ajouter salle -->

  <div>
    <h3>
      New user room
    </h3>

    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="adduserRoom">

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
          <div class="form-group">
            <label>NAME</label>
            <input
              type="text"
              required
              class="form-control"
              v-model="room.name"
            />
          </div>

          <div class="form-group">
            <label>OPENING DATE</label>
            <input
              type="datetime-local"
              required
              class="form-control"
              v-model="room.openingDate"
            />
          </div>
          <div class="form-group">
            <label>CLOSING DATE</label>
            <input
              type="datetime-local"
              required
              class="form-control"
              v-model="room.closingDate"
            />
          </div>


          <div class="form-check form-switch" style="margin-left: -35px">
            <input
              class="form-check-input"
              type="checkbox"
              id="flexSwitchCheckChecked"
              v-model="room.suspension"
            />
            <label style="margin-left: 10px" class="form-check-label" for="flexSwitchCheckChecked"
              >SUSPENSED</label
            >
          </div>
<!-- Button valider l'ajout de salle -->
          <button
          class="btn-submit"
            type="submit"     
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
    adduserRoom() {
      axios
        .post("http://localhost:8000/api/room/store", this.room)
        .then((response) => {
          this.$router.push({ name: "homeuser" });
          //console.log(response.data)
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>