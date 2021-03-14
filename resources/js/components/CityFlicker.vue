<template>
  <agile :initial-slide="0" :dots="true" @after-change="changeCity($event)" ref="carousel">
    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Tokyo')" id="Tokyo"/>
      <div class="position-absolute slide-content justify-content-center">
        <h1>Tokyo</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>
      </div>
    </div>

    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Yokohama')" id="Yokohama"/>
      <div class="position-absolute slide-content">
        <h1>Yokohama</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>        
      </div>
    </div>

    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Kyoto')" id="Kyoto"/>
      <div class="position-absolute slide-content">
        <h1>Kyoto</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>
      </div>
    </div>

    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Osaka')" id="Osaka"/>
      <div class="position-absolute slide-content">
        <h1>Osaka</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>
      </div>
    </div>

    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Sapporo')" id="Sapporo"/>
      <div class="position-absolute slide-content">
        <h1>Sapporo</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>
      </div>
    </div>

    <div class="slide-container h-100 position-relative">
      <img class="slide" :src="cityImg('Nagoya')" id="Nagoya"/>
      <div class="position-absolute slide-content">
        <h1>Nagoya</h1>
        <div class="btn-container d-flex justify-content-center">
          <div class="btn btn-info m-2"><img class="detail-icon" :src="weather_icon_url" alt="Weather" @click="clickModal('weather_details')"></div>
          <div class="btn btn-info m-2"><img class="detail-icon" :src="venues_icon_url" alt="Venues" @click="clickModal('venue_details')"></div>
        </div>
      </div>
    </div>

    <template slot="prevButton"><i class="fas fa-chevron-left"></i><</template>
    <template slot="nextButton"><i class="fas fa-chevron-right"></i>></template>
  </agile>
</template>

<style>
.agile__nav-button {
  background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: 24px;
  height: 100%;
  position: absolute;
  top: 0;
  transition-duration: 0.3s;
  width: 80px;
}
.agile__nav-button:hover {
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 1;
}
.agile__nav-button--prev {
  left: 0;
}
.agile__nav-button--next {
  right: 0;
}
.agile__dots {
  bottom: 10px;
  left: 50%;
  position: absolute;
  transform: translateX(-50%);
}
.agile__dot {
  margin: 0 10px;
}
.agile__dot button {
  background-color: transparent;
  border: 1px solid #fff;
  border-radius: 50%;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.3s;
  width: 10px;
}
.agile__dot--current button, .agile__dot:hover button {
  background-color: #fff;
}
.agile__list{
  height: 100vh!important;
}
.btn-info{
  background-color: transparent!important;
}
.btn-info:hover{
  background-color: #6cb2eb!important;
}
.detail-icon{
  width: 35px;
  height: 35px;
}
.slide{
  display: block;
  height: 100vh;
  object-fit: cover;
  width: 100%;
  opacity: .4;
}
.slide-container{
  background: black;
}
.slide-content{
  width: 300px;
  height: 200px;
  --webkit-var-width: 300px;
  --webkit-var-height: 200px;
  color: #ffff;
  top: calc(50% - var(--webkit-var-height) / 2)!important;
  left: calc(50% - var(--webkit-var-width) / 2)!important;
}
h1{
  font-size: 3rem;
  text-align: center;
}
</style>

<script>
  export default{
    props:{
      city: String
    },
    data(){
      return {
        url: process.env.MIX_APP_URL + '/images',
        flicker_city: null
      }
    },
    computed:{
      weather_icon_url(){
        return this.url + '/cloud-sun.svg';
      },
      venues_icon_url(){
        return this.url + '/map-marked-alt.svg';
      }
    },
    mounted(){
      this.flicker_city = this.city
    },
    watch:{
      flicker_city: function(newCity, oldCity){
        this.$emit('update:city', this.flicker_city)
      }
    },
    methods:{
      changeCity(event){
        var slide_number = this.$refs.carousel.getCurrentSlide()
        this.$emit('changeSlide', slide_number)
        console.log(event)
      },
      cityImg(city){
        return this.url + '/' + city + '.jpg'
      },
      clickModal(id){
        this.$emit('openModal', id)
      }
    }
  }
</script>