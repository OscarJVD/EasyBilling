<template>
  <div class="container">
    <div class="row justify-content-center mb-2">
      <article class="col-md-6 text-center p-3 bg-white rounded border">
        <h1 class="mb-0">Editar Película</h1>
      </article>
    </div>
    <div class="row justify-content-center">
      <article class="col-md-6 col-md-offset-1 rounded border">
        <div class="form-group">
          <label>Nombre</label>
          <input
            type="text"
            name="name"
            class="form-control"
            required
            value=""
            placeholder="Nombre"
          />
        </div>

        <div class="form-group">
          <label>Descripción</label>
          <textarea
            name="description"
            rows="5"
            class="form-control"
            placeholder="Descripción"
            required
          ></textarea>
        </div>

        <div class="form-group">
          <label for="">Usuario</label>
          <select v-model="userSelected" class="form-control">
            <option value="">Seleccione...</option>
            <option v-for="(user, index) in users" :value="user">
              {{ user.name }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <label for="">Estado</label>
          <select v-model="statusSelected" class="form-control">
            <option value="">Seleccione...</option>
            <option v-for="(status, index) in statuses" :value="status">
              {{ status.name }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-md-12">Categorías</label>
            <div class="col-md-10">
              <select v-model="categorySelected" class="form-control">
                <option value="">Seleccione...</option>
                <option
                  v-for="(category, index) in categories"
                  :value="category"
                >
                  {{ category.name }}
                </option>
              </select>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" @click="addCategory()">+</button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div
            class="row border-bottom text-left"
            v-for="(category, index) in arrCategories"
          >
            <div class="col-md-2 my-2">
              <button
                class="btn btn-outline-danger"
                @click="removeCategory(index)"
              >
                -
              </button>
            </div>
            <div class="col-md-10 my-auto">
              <span>{{ category.name }}</span>
            </div>
          </div>
        </div>

        <div class="form-group text-center">
          <button
            type="submit"
            @click="submitForm()"
            class="btn btn-success shadow-sm"
          >
            Guardar
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
      name: "",
      description: "",
      userSelected: "",
      statusSelected: "",
      categorySelected: "",
      arrCategories: [],
      showError: false,
    };
  },
  props: {
    url: {
      type: String,
      default: "",
    },
    movie: {
      type: Object,
      default: {},
    },
    users: {
      type: Array,
      default: [],
    },
    statuses: {
      type: Array,
      default: [],
    },
    categories: {
      type: Array,
      default: [],
    },
  },
  methods: {
    addCategory: function () {
      if (this.categorySelected !== "") {
        // validaciones
        if (
          typeof this.existCategory(this.categorySelected.id) === "undefined"
        ) {
          this.arrCategories.push(this.categorySelected);
          this.categorySelected = "";
        } else alert("La categoría ya se encuentra seleccionada");
      } else alert("Debe seleccionar al menos una categoría");
    },

    existCategory: function (categoryId) {
      let existCategory = this.arrCategories.find(function (category) {
        return category.id === categoryId;
      });

      return existCategory;
    },

    removeCategory: function (categoryId) {
      this.arrCategories.splice(categoryId, 1);
    },

    submitForm: function () {
      if (
        this.userSelected != "" &&
        this.statusSelected != "" &&
        this.name != "" &&
        this.description != "" &&
        this.arrCategories.length > 0
      ) {
        let movie = {
          name: this.name,
          description: this.description,
          user: this.userSelected,
          status: this.statusSelected,
          arrCategories: this.arrCategories,
        };

        let url = this.url;

        let that = this;

        axios //se envía a la url
          .put(this.url, movie)
          .then((response) => {
            if (response.data.success === true) {
              alert(response.data.message);
              location.href = that.url;
            } else alert(response.data.message);
          })
          .catch((error) => {
            console.log(error);
            alert("Error insertando la película");
          });
      } else this.showError = true;
    },
  },
};
</script>
