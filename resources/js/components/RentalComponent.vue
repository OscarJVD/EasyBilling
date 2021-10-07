<template>
  <div class="container">
    <div class="row justify-content-center mb-2">
      <article class="col-md-6 text-center p-3 bg-white rounded border">
        <h1 class="mb-0">Nuevo Alquiler</h1>
      </article>
    </div>
    <div class="row justify-content-center">
      <article class="col-md-6 col-md-offset-1 rounded border">
        <div class="form-group">
          <label>Fecha inicial</label>
          <input
            type="datetime-local"
            v-model="start_date"
            class="form-control"
            required
          />
          <div
            class="alert alert-danger"
            role="alert"
            v-if="showError === true"
          >
            El atributo es requerido
          </div>
        </div>
        <div class="form-group">
          <label>Fecha final</label>
          <input
            type="datetime-local"
            v-model="end_date"
            class="form-control"
            required
          />
        </div>
        <div class="form-group">
          <label>Total</label>
          <input
            type="number"
            v-model="total"
            class="form-control"
            required
            placeholder="Precio Total"
          />
        </div>
        <div class="form-group">
          <label>Precio Unitario</label>
          <input
            type="number"
            v-model="price"
            class="form-control"
            required
            placeholder="Precio Unitario"
          />
        </div>
        <div class="form-group">
          <label>Observaciones</label>
          <textarea
            v-model="observations"
            rows="5"
            class="form-control"
            placeholder="Observaciones"
            required
          ></textarea>
        </div>
        <div class="form-group">
          <label>Usuario</label>
          <select v-model="userSelected" class="form-control">
            <option value selected>Seleccione...</option>
            <option v-for="(user, index) in users" :value="user">
              {{ user.name }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-md-12">Películas</label>
            <div class="col-md-10">
              <select v-model="movieSelected" class="form-control">
                <option value="">Seleccione...</option>
                <option v-for="(movie, index) in movies" :value="movie">
                  {{ movie.name }}
                </option>
              </select>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" @click="addMovie()">+</button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div
            class="row border-bottom text-left"
            v-for="(movie, index) in arrMovies"
          >
            <div class="col-md-2 my-2">
              <button
                class="btn btn-outline-danger"
                @click="removemovie(index)"
              >
                -
              </button>
            </div>
            <div class="col-md-10 my-auto">
              <span>{{ movie.name }}</span>
            </div>
          </div>
        </div>

        <div class="form-group text-center">
          <button @click="submitForm()" class="btn btn-success shadow-sm">
            Enviar
          </button>
        </div>
      </article>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      start_date: "",
      end_date: "",
      total: "",
      price: "",
      observations: "",
      userSelected: "",
      movieSelected: "",
      arrMovies: [],
      showError: false,
    };
  },
  props: {
    url: {
      type: String,
      default: "",
    },
    users: {
      type: Array,
      default: [],
    },
    movies: {
      type: Array,
      default: [],
    },
  },
  methods: {
    addMovie: function () {
      if (this.movieSelected !== "") {
        // validaciones
        if (typeof this.existMovie(this.movieSelected.id) === "undefined") {
          this.arrMovies.push(this.movieSelected);
          this.movieSelected = "";
        } else alert("La película ya se encuentra seleccionada");
      } else alert("Debe seleccionar al menos una película");
    },

    existMovie: function (movieId) {
      let existMovie = this.arrMovies.find(function (movie) {
        return movie.id === movieId;
      });

      return existMovie;
    },

    removemovie: function (movieId) {
      this.arrMovies.splice(movieId, 1);
    },

    submitForm: function () {
      if (
        this.start_date != "" &&
        this.end_date != "" &&
        this.total != "" &&
        this.price != "" &&
        this.observations != "" &&
        this.userSelected != "" &&
        this.arrMovies.length > 0
      ) {
        let rental = {
          start_date: this.start_date,
          end_date: this.end_date,
          total: this.total,
          price: this.price,
          observations: this.observations,
          user: this.userSelected,
          arrMovies: this.arrMovies,
        };

        let url = this.url;

        let that = this;

        axios //se envía a la url
          .post(this.url, rental)
          .then((response) => {
            if (response.data.success === true) {
              alert(response.data.message);
              location.href = that.url;
            } else alert(response.data.message);
          })
          .catch((error) => {
            console.log(error);
            alert("Error insertando el alquiler");
          });
      } else this.showError = true;
    },
  },
};
</script>
