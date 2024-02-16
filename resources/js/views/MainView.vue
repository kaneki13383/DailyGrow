<template>
  <div class="background">    
    <form>
      <div v-if="login == false">
        <label for="">Имя</label>
        <input type="text" v-model="name" placeholder="Имя">
      </div>
      <div>
        <label for="">Email</label>
        <input type="email" v-model="email" placeholder="Email">
      </div>
      <div>
        <label for="">Пароль</label>
        <input type="password" v-model="password" placeholder="Пароль">
      </div>
      <div v-if="login == false">
        <label for="">Повторите пароль</label>
        <input type="password" v-model="password_repeat" placeholder="Повторите пароль">
      </div>
      <button v-if="login == false" @click.prevent="register()">Зарегистрироваться</button>
      <button v-else @click.prevent="Login()">Войти</button>
      <p v-if="error_message != ''">{{ error_message }}</p>
      <p v-if="login == false">Уже есть аккаунт? <span @click="login = true">Войдите</span></p>
      <p v-else>Нет аккаунта? <span @click="login = false">Зарегистируйтесь</span></p>
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_repeat: '',
        error_message: '',
        login: false
      }
    },
    updated() {
      if (localStorage.getItem('token')) {
        this.$router.push("/client/list");
      }
      else{
        this.$router.push("/");
      }
    },
    methods: {
      register(){
        if (this.password == this.password_repeat) {
          axios.post('/api/register', {
            name: this.name,
            email: this.email,
            password: this.password
          })
          .then(res => {
            localStorage.setItem("token", res.data["content"]);
            this.$router.push("/client/list");
          })
        }else{
          this.error_message = 'Пароли не совпадают'
        }        
      },
      Login() {
        axios.post("/api/login", {
            email: this.email,
            password: this.password,
          })
          .then((res) => {
            localStorage.setItem("token", res.data["content"]);
              this.$router.push("/client/list");
          });
      },
    },
  }
</script>

<style lang="scss" scoped>
.background{
  width: 500px;
  margin: auto;
  margin-top: 5%;
  form{
    display: flex;
    flex-direction: column;
    gap: 16px;
    div{
      display: flex;
      flex-direction: column;
      gap: 6px;
      label{
        font-size: 10px;
        font-weight: 500;
        line-height: 10px;
        letter-spacing: 0.20000000298023224px;
        text-align: left;
        color: #252733;
      }
      input::placeholder{
        font-size: 12px;
      }
      input{
        padding: 7px 0 8px 10px;
        height: 25px;
        border-radius: 6px;
        border: 1px solid #E0E7EC;
      }
      input:focus-visible {
        outline-offset: -100px;
      }
    }
    button{
      cursor: pointer;
      background: #339AF0;
      color: #fff;
      width: 40%;
      height: 30px;
      border: none;
      border-radius: 8px;
    }
    p{
      span{
        cursor: pointer;
        color: #339AF0;
        border-bottom: 1px solid #339AF0;
      }
    }
  }
}
  
</style>