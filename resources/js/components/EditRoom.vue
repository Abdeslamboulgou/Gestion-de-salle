<template >
  <!-- La page pour modifier salle admin -->

  <div>
    <h3>
      Edit room
    </h3>
    <div class="edit-room">
      <div class="col-md-6">
        <form @submit.prevent="updateRoom">
          <div class="form-group">
            <label>OWNER</label>
            <select class="form-select"  v-model="room.id_owner" required>
              <option>1</option>
              <option>2</option>
            </select>
          </div>
          <div class="form-group">
            <label>TYPE</label>

            <select class="form-select" v-model="room.type" required>
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
            <input type="text"  required class="form-control"
              v-model="room.name" />
          </div>

          <div class="form-group">
            <label>OPENING DATE</label>
            <input type="datetime-local" required  class="form-control"
              v-model="room.openingDate" />
          </div>
          <div class="form-group">
            <label>CLOSING DATE</label>
            <input type="datetime-local" required class="form-control"
              v-model="room.closingDate" />
          </div>

          <br>
          <div class="form-check form-switch" style="margin-left:-35px;">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" v-model="room.suspension"
              checked />
            <label style="margin-left: 10px" class="form-check-label" for="flexSwitchCheckChecked"> SUSPENSED</label>
          </div>

          <!-- Popup modification de salle bien fait -->
          <div class="modal" role="dialog" id="MyModal" v-if="
            room.openingDate > timestamp &&
            room.closingDate > room.openingDate &&
            (room.openingDate != null || room.closingDate != null)
          ">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" >
                  <h5 class="modal-title">{{ room.name }}</h5>

                  <!--route vers page home -->

                  <button @click="goToHome()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>the room was updated successfully !</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Popup modification de salle n'est pas bien fait -->

          <div class="modal" role="dialog" id="MyModal" v-else>
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header" >
                  <h5 class="modal-title">{{ room.name }}</h5>

                  <!--route vers page edit salle -->

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    @click="goToEdit()"></button>
                </div>
                <div class="modal-body">
                  <p>the room was not updated !</p>
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn-submit" data-bs-toggle="modal" data-bs-target="#MyModal">
            Update
          </button>
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
      timestamp: "",
    };
  },

  mounted() {
    this.showRoom();
  },
  methods: {
    getNow() {
      const today = new Date();
      const date = today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear();
      const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      const dateTime = date + " " + time;
      this.timestamp = dateTime;
    },

    showRoom() {
      let url = "http://localhost:8000/api/room/edit/" + this.$route.params.uid;
      console.log(url);
      axios.get(url).then((response) => {
        this.room = response.data.room;
      });
    },
    goToEdit() {
      this.$router.push({ name: "edit", params: { uid: this.room.uid } });
    },
    goToHome() {
      this.$router.push({ name: "home" });
    },
    updateRoom() {
      axios
        .post(
          `http://localhost:8000/api/room/update/${this.$route.params.uid}`,
          this.room
        )
        .then((response) => {
          this.room = response.data.room;
        });
    },
  },
};
</script>