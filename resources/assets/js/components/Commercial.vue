<template>
  <youtube :video-id="vid" @ended="slide()" player-width="100%" player-height="500" :player-vars="{autoplay: 1}"></youtube>
</template>
<script>
export default {
    data(){
        return {
            vid: '',
            vids: vids,
            i: 0
        }
    },
    methods: {
        slide() {
            this.i++;
            if (this.i == this.vids.length) {
                window.location.href = '/home?filter=banners'; // images
            } else {
                this.vid = this.vids[this.i];
            }
        }
    },
    created(){
        this.vid = vids[0];
    }
}
</script>
