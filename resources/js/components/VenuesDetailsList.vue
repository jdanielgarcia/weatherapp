<template>
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><img :src="venue_icon_string" style="width: 25px; height: 25px; margin-top: -10px; margin-right: 10px">Venues</h5>
        <img class="btn" :src="times_icon_url" style="height: 25px;" @click="dismissModal">
      </div>
      <div class="modal-body">
        <div class="card mb-2" v-for="(venue, key) in venues" :key=key>
          <div class="row mt-2 p-2">
            <div class="col-md-12 pr-4 pl-4">
              <img class="card-icon" :src="map_icon_url">{{venue.name}}<br>
              <img class="card-icon" :src="info_icon_url">{{venue.address}}<br>
            </div>
          </div>
          <div class="row mt-2 p-2">
            <div class="col-md-12 pr-4 pl-4" v-for="(category, key) in venue.categories">
              <img class="card-category-icon" :src="category.icon_url">{{category.name}}<br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<style scoped>
  .card{
    transition: box-shadow 0.3s ease-in-out;
  }
  .card:hover{
    box-shadow: 0px 0px 5px #888;
  }
  img.card-icon{
    width: 20px;
    height: 15px;
    margin-top: -5px;
    margin-right: 5px;
  }
  img.card-category-icon{
    width: 25px;
    height: 25px;
    margin-top: -5px;
    margin-right: 5px;
    background-color: darkgray;
    border-radius: 15px;
    box-shadow: 0px 0px 5px #888;
  }
</style><script>
  export default {
    props:{
      venues: Array,
    },
    data(){
      return {
        url: process.env.MIX_APP_URL + '/images'
      }
    },
    computed:{
      info_icon_url(){
        return this.url + '/info-circle.svg';
      },
      map_icon_url(){
        return this.url + '/map-marker-alt.svg';
      },
      times_icon_url(){
        return this.url + '/times.svg';
      },
      venue_icon_string(){
        return this.url + '/map-marked-alt-black.svg';
      },
    },
    methods:{
      dismissModal(){
        this.$emit('closeModal', 'venue_details')
      },
      getCategoryIcon(){

      },
    }
  }
</script>