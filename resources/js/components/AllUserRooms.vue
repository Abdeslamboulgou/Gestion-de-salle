<template>
  <div>
    <h3>
      List of user rooms
    </h3>

    <!-- route vers la page d'ajout de salle  -->

    <router-link :to="{ name: 'adduser' }" class="nav-item nav-link" role="button">
      <button type="submit" class="btn-addroom">
        Add room
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus"
          viewBox="0 0 16 16">
          <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
      </button>
    </router-link>
  </div>
  <div>
    <table class="table">
      <thead>
        <tr>
                  <th>
            <div class="param-room">OWNER</div>
          </th>
          <th>
            <div class="param-room">NAME</div>
          </th>
          <th>
            <div class="param-room">TYPE</div>
          </th>
          <th>
            <div class="param-room">OPENING DATE</div>
          </th>
          <th>
            <div class="param-room">CLOSING DATE</div>
          </th>

          <th>
            <div class="param-room">SUSPENSED</div>
          </th>
          <th>
            <div class="param-room"> <svg xmlns="http://www.w3.org/2000/svg" width="14"
                height="14" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path
                  d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg></div>
          </th>
          <th>
            <div class="param-room" >
              
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path
                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
              </svg>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="room in rooms" :key="room.uid">
          <td>{{ room.id_owner }}</td>
          <td>{{ room.name }}</td>
          <td>{{ room.type }}</td>
          <td>{{ moment(room.openingDate).format("DD-MM-YYYY h:mm:ss ") }}</td>
          <td>{{ moment(room.closingDate).format("DD-MM-YYYY h:mm:ss ") }}</td>
          <td>

            <!-- Popup suspension de salle bien fait -->
            <div class="form-check form-switch" v-if="room.suspension">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" :v-model="!room.suspension"
                @change="suspensionRoom(room.uid)" data-bs-toggle="modal" :data-bs-target="'#MyModal2_' + room.uid" />

              <div class="modal" :id="'MyModal2_' + room.uid">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{ room.name }}</h4>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5>the room is continue !</h5>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- Popup suspension de salle déjà fait  -->

            <div class="form-check form-switch " v-else-if="!room.suspension">
              <input class="form-check-input" type="checkbox" :v-model="room.suspension" id="flexSwitchCheckChecked"
                data-bs-toggle="modal" :data-bs-target="'#MyModal1_' + room.uid" />

              <div class="modal" :id="'MyModal1_' + room.uid">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{ room.name }}</h4>

                      <!-- bouton pour fermer le popup -->

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5>The room was suspended successfully </h5>
                    </div>
                    <div class="modal-footer">

                      <!-- botton confirmation suspension d'une salle -->

                      <button class="btn-yes" data-bs-dismiss="modal" @click="suspensionRoom(room.uid)">
                        OK
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>

          <td>
            <!-- route vers la page modifier salle -->

            <router-link :to="{ name: 'edituser', params: { uid: room.uid } }" 
              style=" color: #707070;border:none;background-color: #ffffff;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path
                  d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg></router-link>
          </td>
          <!-- botton pour la supression de salle -->
          <td>
            <button  data-bs-toggle="modal" :data-bs-target="'#MyModal_'+room.uid"
              style=" color: #707070;border:none;background-color: #ffffff;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path
                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
              </svg>
            </button>
          </td>
          <!-- popup supression d'une salle -->

          <div class="btn-group" role="group">
            <div class="modal" :id="'MyModal_' + room.uid">
              <div class="modal-dialog">
                <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  <div class="modal-header">
                    <h6 class="modal-title">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                                                        <th>owner</th>
                            <th>type</th>

                            <th>Name</th>
                            <th>openingDate</th>
                            <th>closingDate</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ room.name }}</td>
                            <td>{{ room.id_owner }}</td>
                            <td>
                              {{
                                  moment(room.openingDate).format(
                                    "DD-MM-YYYY h:mm:ss "
                                  )
                              }}
                            </td>
                            <td>
                              {{
                                  moment(room.closingDate).format(
                                    "DD-MM-YYYY h:mm:ss "
                                  )
                              }}
                            </td>
                            <td>{{ room.type }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </h6>
                  </div>

                  <div class="modal-body">
                    <h4 class="modal-title">
                      Do you want to delete the room ?
                    </h4>
                  </div>

                  <div class="modal-footer">
                    <!-- botton confirmation supression d'une salle -->

                    <button class="btn-yes"
                      data-bs-dismiss="modal" @click="deleteRoom(room.uid)">
                      Yes
                    </button>
                    <button type="submit" class="btn btn-light" data-bs-dismiss="modal">
                      No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import moment from "moment";

export default {
  data() {
    return {
      rooms: [],
    };
  },
  created() {
    axios.get("http://localhost:8000/api/showuser-room").then((response) => {
      this.rooms = response.data.rooms;
    });
  },
  methods: {
    moment(date) {
      return moment(date);
    },
    suspensionRoom(uid) {
      axios
        .post("http://localhost:8000/api/room/rooms-suspended/" + uid)
        .then((response) => {
          this.rooms = response.data.rooms;
        });
    },
    deleteRoom(uid) {
      axios
        .delete(`http://localhost:8000/api/room/delete/${uid}`)
        .then((response) => {
          let i = this.rooms.map((item) => item.uid).indexOf(uid); // find index of object
          this.rooms.splice(i, 1);
        });
    },
  },
};
</script>