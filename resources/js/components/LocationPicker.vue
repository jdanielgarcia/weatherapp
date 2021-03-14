<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        
        <div class="card m-2 w-100" v-for="(city, key) in locations">
          <div class="card-body">
            <h1>{{city}}</h1>
          </div>
        </div>

      </div>
    </div>

    <select v-model="selected_city">
      <option v-for="(city, key) in locations" :value="city">{{city}}</option>
    </select>
    <div class="">
      <div class="card" v-for="(forecast, key) in forecasts" :key="key">
        <div class="card-body">
          <h5 class="card-title">{{forecast.date}}</h5>
          <h5 class="card-title">{{forecast.time}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{forecast.description}}</h6>
          <p class="card-text"></p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
  .card{
    width: 300px;
  }
</style>
<script>
  export default{
    data(){
      return {
        locations:['Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya'],
        selected_city: '',
        venues: [],
        forecasts: []
      };
    },
    watch: {
      'selected_city': 'getCityWeather'
    },
    methods: {
      getCityWeather(){
        let that = this;
        axios.post(process.env.MIX_APP_URL+'/api/gwf', {city: this.selected_city}).then(response=>{
          that.venues = response.data.DATA.venues
          that.forecasts = response.data.DATA.forecasts
          console.log(response)
        })
      }
    }
  }
</script>